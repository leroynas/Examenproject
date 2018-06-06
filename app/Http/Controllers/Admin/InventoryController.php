<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use App\Product;

class InventoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Location $location)
    {
        $locations = Location::all();
        $overall = (object)[
            'purchaseTotal' => 0,
            'sellingTotal' => 0,
        ];

        foreach ($locations as $loc) {
            $loc->purchaseTotal = 0;
            $loc->sellingTotal = 0;

            foreach ($loc->products as $prod) {
                $loc->purchaseTotal += $prod->pivot->count * $prod->purchase_price;
                $loc->sellingTotal += $prod->pivot->count * $prod->selling_price;
            }

            $overall->purchaseTotal += $loc->purchaseTotal;
            $overall->sellingTotal += $loc->sellingTotal;

            $loc->purchaseTotal = number_format($loc->purchaseTotal / 100, 2, ',', '.');
            $loc->sellingTotal = number_format($loc->sellingTotal / 100, 2, ',', '.');
        }

        $overall->purchaseTotal = number_format($overall->purchaseTotal / 100, 2, ',', '.');
        $overall->sellingTotal = number_format($overall->sellingTotal / 100, 2, ',', '.');

        return view('admin.inventory.index', compact('location', 'locations', 'overall'));
    }

    public function show(Request $request)
    {
        $validator = $request->validate([
            'location_id' => 'required|exists:locations,id',
            'product_id' => 'required|exists:products,id'
        ]);

        $location = Location::find($request->location_id);


        if (!$location->products->contains($request->product_id)) {
            return redirect()->route('dashboard')->with('status', 'Product niet aanwezig.');
        }

        $product = $location->products()->find($request->product_id);

        return view('admin.inventory.show', compact('location', 'product'));
    }

    public function create(Location $location)
    {
        $products = Product::all();
        return view('admin.inventory.create', compact('products', 'location'));
    }

    public function store(Request $request, Location $location)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'count' => 'required|integer|max:500',
            'min_count' => 'required|integer|max:500',
        ]);

        $product = Product::find($request->product_id);
        $location->products()->attach($product, [
            'count' => $request->count,
            'min_count' => $request->min_count
        ]);

        return redirect(route('inventory.index', ['location' => $location->id]));
    }

    public function edit(Location $location, Product $product)
    {
        $product = $location->products()->find($product->id);
        return view('admin.inventory.edit', compact('product', 'location'));
    }

    public function update(Request $request, Location $location, Product $product)
    {
        $request->validate([
            'count' => 'required|integer|max:500',
            'min_count' => 'required|integer|max:500',
        ]);

        $location->products()->updateExistingPivot($product, [
            'count' => $request->count,
            'min_count' => $request->min_count
        ]);

        return redirect(route('inventory.index', ['location' => $location->id]));
    }

    public function delete(Location $location, Product $product)
    {
        $location->products()->detach($product);
        return redirect(route('inventory.index', ['location' => $location->id]));
    }
}

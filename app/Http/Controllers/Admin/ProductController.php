<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProduct;
use App\Manufacterer;
use App\Product;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $manufacterers = Manufacterer::all();
        return view('admin.products.create', compact('manufacterers'));
    }

    public function store(StoreProduct $request)
    {
        $manufacterer = Manufacterer::find($request->manufacterer_id);

        $product = new Product([
            'name' => $request->name,
            'type' => $request->type,
            'purchase_price' => floatval(str_replace(',', '.', $request->purchase_price)) * 100,
            'selling_price' => floatval(str_replace(',', '.', $request->selling_price)) * 100
        ]);

        $manufacterer->products()->save($product);

        return redirect(route('products.index'));
    }

    public function edit(Product $product) {
        $manufacterers = Manufacterer::all();
        return view('admin.products.edit', compact('manufacterers', 'product'));
    }


    public function update(StoreProduct $request, Product $product)
    {
        $product->update([
            'manufacterer_id' => $request->manufacterer_id,
            'name' => $request->name,
            'type' => $request->type,
            'purchase_price' => floatval(str_replace(',', '.', $request->purchase_price)) * 100,
            'selling_price' => floatval(str_replace(',', '.', $request->selling_price)) * 100
        ]);

        return redirect(route('products.index'));
    }

    public function delete(Product $product) {
        $product->delete();
        return redirect(route('products.index'));
    }
}

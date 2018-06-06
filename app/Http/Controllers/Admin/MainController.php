<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Location;
use App\Product;
use App\Inventory;

class MainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $locations = Location::all();
        $products = Product::all();
        $overall = (object)[
            'purchaseTotal' => 0,
            'sellingTotal' => 0,
        ];

        foreach ($locations as $location) {
            $location->purchaseTotal = 0;
            $location->sellingTotal = 0;

            foreach ($location->products as $product) {
                $location->purchaseTotal += $product->pivot->count * $product->purchase_price;
                $location->sellingTotal += $product->pivot->count * $product->selling_price;
            }

            $overall->purchaseTotal += $location->purchaseTotal;
            $overall->sellingTotal += $location->sellingTotal;

            $location->purchaseTotal = number_format($location->purchaseTotal / 100, 2, ',', '.');
            $location->sellingTotal = number_format($location->sellingTotal / 100, 2, ',', '.');
        }

        $overall->purchaseTotal = number_format($overall->purchaseTotal / 100, 2, ',', '.');
        $overall->sellingTotal = number_format($overall->sellingTotal / 100, 2, ',', '.');

        return view('admin.index', compact('locations', 'overall', 'products'));
    }
}

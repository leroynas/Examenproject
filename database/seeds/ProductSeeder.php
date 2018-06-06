<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Manufacterer;

class ProductSeeder extends Seeder
{
    private $dataset = [
        [1, 'Accuboorhamer', 'WX 382', 6995, 11175],
        [2, '4-in-1 schuurmachine', 'KA 280 K', 5595, 6795],
        [3, 'Verstekzaak', 'BT-MS 21112', 4995, 6749],
        [4, 'Alleszuiger', 'WD2.200', 2995, 4796],
        [5, 'Accuboormachine', 'PSR 14.4', 5995, 6800],
        [6, '33-delige borenset', 'DEL 33', 995, 1520],
        [2, 'Workmate', 'WM 536', 4995, 6320],
        [5, 'Kruislijnlaserset', 'PCL 20', 9995, 12240]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dataset as $set) {
            $manufacterer = Manufacterer::find($set[0]);

            $product = new Product([
                'name' => $set[1],
                'type' => $set[2],
                'purchase_price' => $set[3],
                'selling_price' => $set[4]
            ]);

            $manufacterer->products()->save($product);
        }
    }
}

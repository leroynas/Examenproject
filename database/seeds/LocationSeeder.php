<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Location;

class LocationSeeder extends Seeder
{
    private $dataset = [
        ['Rotterdam', [
            [1, 10, 8],
            [2, 15, 15],
            [3, 2, 10]
        ]],
        ['Almere', [
            [4, 4, 8],
            [1, 11, 10],
            [5, 12, 8],
            [6, 54, 20]
        ]],
        ['Eindhoven', [
            [7, 14, 20],
            [8, 11, 8],
            [1, 11, 10],
            [5, 12, 5]
        ]]
    ];



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dataset as $set) {
            $location = Location::create([
                'name' => $set[0],
            ]);

            foreach ($set[1] as $pivot) {
                $product = Product::find($pivot[0]);
                $location->products()->attach($product, ['count' => $pivot[1],'min_count' => $pivot[2]]);
            }
        }
    }
}

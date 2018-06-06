<?php

use Illuminate\Database\Seeder;
use App\Manufacterer;

class ManufactererSeeder extends Seeder
{
    private $dataset = [
        ['Worx', '06-95739573'],
        ['Black & Decker', '06-82759275'],
        ['Einhell', '06-27549475'],
        ['Kärcher', '06-83658374'],
        ['Bosch', '06-58475847'],
        ['Sencys', '06-83758475']
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->dataset as $set) {
            Manufacterer::create([
                'name' => $set[0],
                'phone' => $set[1],
            ]);
        }
    }
}

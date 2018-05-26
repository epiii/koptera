<?php

use Illuminate\Database\Seeder;
use App\Uom;

class UomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
      Uom::create([
        'nama'=>'cm',
        'keterangan'=>'centimeter',
      ]);
      Uom::create([
        'nama'=>'m',
        'keterangan'=>'meter',
      ]);
      Uom::create([
        'nama'=>'g',
        'keterangan'=>'gram',
      ]);
      Uom::create([
        'nama'=>'kg',
        'keterangan'=>'kilogram',
      ]);
    }
}

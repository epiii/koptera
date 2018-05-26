<?php

use Illuminate\Database\Seeder;
use App\Merk;

class MerkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Merk::create(['nama'=>'GSC']);
      Merk::create(['nama'=>'Allegra']);
      Merk::create(['nama'=>'AND']);
      Merk::create(['nama'=>'QUATRO']);
      Merk::create(['nama'=>'PT']);
      Merk::create(['nama'=>'CAS']);
    }
}

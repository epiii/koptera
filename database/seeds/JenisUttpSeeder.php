<?php

use Illuminate\Database\Seeder;
use App\JenisUttp;

class JenisUttpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      JenisUttp::create([
        'nama'=>'spbu',
        'keterangan'=>'peralatan yang digunakan pada spbu',
      ]);
      JenisUttp::create([
        'nama'=>'non spbu',
        'keterangan'=>'peralatan yang digunakan selain spbu',
      ]);
    }
}

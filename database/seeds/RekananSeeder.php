<?php

use Illuminate\Database\Seeder;
use App\Rekanan;

class RekananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Rekanan::create([
        'nama'=>'CV JATIM TRONIK',
        'alamat'=>'....',
      ]);
      Rekanan::create([
        'nama'=>'PT. MUGI',
        'alamat'=>'....',
      ]);
      Rekanan::create([
        'nama'=>'CV. Anugerah Teknik',
        'alamat'=>'...',
      ]);
      Rekanan::create([
        'nama'=>'PT. Winiharto',
        'alamat'=>'....',
      ]);
      Rekanan::create([
        'nama'=>'PT. Gewinn',
        'alamat'=>'....',
      ]);
      Rekanan::create([
        'nama'=>'ASINDOTEK REKAYASA MANDIRI',
        'alamat'=>'....',
      ]);
      Rekanan::create([
        'nama'=>'CV. Pharma Teknik',
        'alamat'=>'....',
      ]);
    }
}

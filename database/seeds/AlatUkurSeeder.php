<?php

use Illuminate\Database\Seeder;
use App\AlatUkur;

class AlatUkurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      AlatUkur::create([
        'id_perusahaan'=>1,
        'id_uttp'=>3,
        'id_merk'=>2,
        'id_uom'=>4,
        'tipe'=>'AD 4347A',
        'no_seri'=>'C 8503353',
        'kapasitas'=>'6000',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>1,
        'id_uttp'=>3,
        'id_merk'=>3,
        'id_uom'=>4,
        'tipe'=>'AD 4329',
        'no_seri'=>'N 1502729',
        'kapasitas'=>'6000',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>1,
        'id_uttp'=>2,
        'id_merk'=>6,
        'id_uom'=>4,
        'tipe'=>'C1-2000-AS',
        'no_seri'=>'0406000894',
        'kapasitas'=>'2000',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>2,
        'id_uttp'=>3,
        'id_merk'=>3,
        'id_uom'=>4,
        'tipe'=>'AD 4329',
        'no_seri'=>'N1518441',
        'kapasitas'=>'4000',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>2,
        'id_uttp'=>2,
        'id_merk'=>1,
        'id_uom'=>4,
        'tipe'=>'SGW',
        'no_seri'=>'72087',
        'kapasitas'=>'2000',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>2,
        'id_uttp'=>2,
        'id_merk'=>1,
        'id_uom'=>4,
        'tipe'=>'SGW',
        'no_seri'=>'72321',
        'kapasitas'=>'2000',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>2,
        'id_uttp'=>3,
        'id_merk'=>3,
        'id_uom'=>4,
        'tipe'=>'AD 4329 A',
        'no_seri'=>'GA 6001074',
        'kapasitas'=>'2000',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>2,
        'id_uttp'=>2,
        'id_merk'=>3,
        'id_uom'=>4,
        'tipe'=>'AD 4329 A',
        'no_seri'=>'GA 6000105',
        'kapasitas'=>'2500',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>2,
        'id_uttp'=>2,
        'id_merk'=>3,
        'id_uom'=>4,
        'tipe'=>'AD 4329 A',
        'no_seri'=>'GA 6000134',
        'kapasitas'=>'2500',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>2,
        'id_uttp'=>2,
        'id_merk'=>NULL,
        'id_uom'=>4,
        'tipe'=>NULL,
        'no_seri'=>NULL,
        'kapasitas'=>'4000',
      ]);
      AlatUkur::create([
        'id_perusahaan'=>2,
        'id_uttp'=>2,
        'id_merk'=>NULL,
        'id_uom'=>4,
        'tipe'=>NULL,
        'no_seri'=>NULL,
        'kapasitas'=>'150',
      ]);
    }
}

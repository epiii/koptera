<?php

use Illuminate\Database\Seeder;
use App\Uttp;

class UttpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Uttp::create([
        'nama'=>'Nozzle',
        'id_jenisuttp'=>'1',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'TE',
        'id_jenisuttp'=>'2',
        'keterangan'=>'Timbangan E. adalah',
      ]);
      Uttp::create([
        'nama'=>'T.JE',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'T.SENT',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'T.Meja',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'T.Pegas',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'T.Cepat',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'T.Pengisi',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'TBI',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'Conveyor Belt',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'Filling Machine',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'TUTSIDA',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'AT',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'Neraca',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'TUTSIT',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
      Uttp::create([
        'nama'=>'BU',
        'id_jenisuttp'=>'2',
        'keterangan'=>'pu bbm adalah ...',
      ]);
    }
}

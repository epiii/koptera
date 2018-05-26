<?php

use Illuminate\Database\Seeder;
use App\Perusahaan;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        Perusahaan::create([
          'nama'=>'PT. Adiprima Suraprinta',
          'alamat'=>'Ds. Sumengko-Wringinanom',
          'id_user'=>1
        ]);
        Perusahaan::create([
          'nama'=>'PT. Adyabuana Persada',
          'alamat'=>'Jl. Ry Wringinanom km 32 ',
          'id_user'=>2
        ]);
        Perusahaan::create([
          'nama'=>'PT. Agri Timur Mas',
          'alamat'=>'KIM Estate Jl Ry Manyar km 25',
          'id_user'=>3
        ]);
    }
}

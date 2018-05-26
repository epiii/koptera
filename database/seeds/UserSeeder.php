<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name'=>'Mr. Harry Pantja',
        'email'=>'manager@adiprimasuraprinta.com',
        'password'=>bcrypt('lalilali29'),
      ]);
      User::create([
        'name'=>'Mustofa Kemal Pasha',
        'email'=>'manager@adyabuanapersada.com',
        'password'=>bcrypt('lalilali29'),
      ]);
      User::create([
        'name'=>'Susi',
        'email'=>'manager@agritimurmas',
        'password'=>bcrypt('lalilali29'),
      ]);
    }
}

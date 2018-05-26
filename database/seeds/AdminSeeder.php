<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Admin::create([
        'name'=>'developer',
        'email'=>'developer@gmail.com',
        'level'=>'developer',
        'password'=>bcrypt('developer'),
      ]);
      Admin::create([
        'name'=>'admin',
        'email'=>'admin@gmail.com',
        'level'=>'admin',
        'password'=>bcrypt('admin'),
      ]);
    }
}

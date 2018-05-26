<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $this->call(UomSeeder::class);
      $this->call([
          UomSeeder::class,
          MerkSeeder::class,
          JenisUttpSeeder::class,
          UttpSeeder::class,
          UserSeeder::class,
          PerusahaanSeeder::class,
          AdminSeeder::class,
          RekananSeeder::class,
          AlatUkurSeeder::class,
      ]);
        // $this->call(UsersTableSeeder::class);
    }
}

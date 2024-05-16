<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RouteSeeder::class,
            GroupSeeder::class,
            UserSeeder::class,
            ColorSeeder::class,
            MaterialSeeder::class,
            TypeSeeder::class
        ]);
    }
}

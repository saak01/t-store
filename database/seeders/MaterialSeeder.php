<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['name' => 'Cotton'],
            ['name' => 'Polyester'],
            ['name' => 'Linen'],
            ['name' => 'Lycra'],
            ['name' => 'Bamboo'],
        ];

        DB::table('materials')->insert($list);
    }
}

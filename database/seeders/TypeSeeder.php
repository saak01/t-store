<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $list = [
            ['name' => 'Jersey'],
            ['name' => 'T-shirt'],
            ['name' => 'Polo'],
            ['name' => 'Jacket'],
            ['name' => 'Dress shirt'],
        ];

        DB::table('types')->insert($list);
    }
}

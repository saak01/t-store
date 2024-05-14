<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user-> name = 'João';
        $user->group_id = 1;
        $user-> email = 'joaovictor@sysout.com';
        $user-> password = bcrypt('sysout');
        $user-> save();

        $user2 = new User();
        $user2-> name = 'Victor';
        $user2->group_id = 1;
        $user2-> email = 'victor@sysout.com';
        $user2-> password = bcrypt('sysout');
        $user2-> save();

        $user3 = new User();
        $user3-> name = 'Fred';
        $user3->group_id = 2;
        $user3-> email = 'fred@sysout.com';
        $user3-> password = bcrypt('sysout');
        $user3-> save();
    }
}

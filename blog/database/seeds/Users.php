<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "User Test",
            'email' => 'user.test.12@mail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

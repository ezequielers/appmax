<?php

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'use_name' => 'AppMax',
            'use_email' => 'admin@appmax.com',
            'use_password' => '123456',
            'use_type' => 'admin',
            'use_active' => 1,
            'remember_token' => Str::random(10)
        ]]);
    }
}

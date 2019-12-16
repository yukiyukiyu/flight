<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 0,
        ]);
        DB::table('users')->insert([
            'username' => 'guest',
            'password' => Hash::make('guest'),
            'role' => 1,
        ]);
    }
}

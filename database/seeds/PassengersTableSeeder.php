<?php

use Illuminate\Database\Seeder;

class PassengersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('passengers')->insert([
            'user_id' => 2,
            'name' => 'Guest',
            'id_number' => '10000020190101000X',
        ]);
    }
}

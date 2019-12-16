<?php

use Illuminate\Database\Seeder;

class PortsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ports')->insert([
            'airport_id' => 1,
            'name' => '1',
            'position' => '一层',
        ]);
        DB::table('ports')->insert([
            'airport_id' => 1,
            'name' => '50',
            'position' => '地下一层',
        ]);
        DB::table('ports')->insert([
            'airport_id' => 2,
            'name' => 'A1',
            'position' => '一层',
        ]);
        DB::table('ports')->insert([
            'airport_id' => 2,
            'name' => 'E50',
            'position' => '二层',
        ]);
    }
}

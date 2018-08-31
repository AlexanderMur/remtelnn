<?php

use Illuminate\Database\Seeder;

class DevicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('devices')->insert([
            'name' => '5',
            'category_id' => '1',
        ]);
        DB::table('devices')->insert([
            'name' => '5S',
            'category_id' => '1',
        ]);
        DB::table('devices')->insert([
            'name' => '6',
            'category_id' => '1',
        ]);
        DB::table('devices')->insert([
            'name' => '6S',
            'category_id' => '1',
        ]);
        DB::table('devices')->insert([
            'name' => '7',
            'category_id' => '1',
        ]);
        DB::table('devices')->insert([
            'name' => '8',
            'category_id' => '1',
        ]);
        DB::table('devices')->insert([
            'name' => '2/3/4',
            'category_id' => '2',
        ]);
        DB::table('devices')->insert([
            'name' => 'mini 1/2/3',
            'category_id' => '2',
        ]);
        DB::table('devices')->insert([
            'name' => 'mini 4',
            'category_id' => '2',
        ]);
        //
    }
}

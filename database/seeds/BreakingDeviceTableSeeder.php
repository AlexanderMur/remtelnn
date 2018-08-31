<?php

use Illuminate\Database\Seeder;

class BreakingDeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breaking_device')->insert([
            'device_id' => '1',
            'breaking_id' => '2',
            'min_price' => '500',
            'max_price' => '5000'
        ]);
        DB::table('breaking_device')->insert([
            'device_id' => '1',
            'breaking_id' => '3',
            'min_price' => '500',
            'max_price' => '5000'
        ]);
        DB::table('breaking_device')->insert([
            'device_id' => '2',
            'breaking_id' => '1',
            'min_price' => '200',
            'max_price' => '3000'
        ]);
        DB::table('breaking_device')->insert([
            'device_id' => '2',
            'breaking_id' => '2',
            'min_price' => '700',
            'max_price' => '3000'
        ]);

        //
    }
}

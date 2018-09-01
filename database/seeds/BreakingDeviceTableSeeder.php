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
            'min_price' => '500|100',
            'max_price' => '5000',
            'info_time' => 'info_time1',
            'info_guarantee' => 'info_guarantee1',
            'info_custom' => 'info_custom1',
        ]);
        DB::table('breaking_device')->insert([
            'device_id' => '1',
            'breaking_id' => '3',
            'min_price' => '500',
            'max_price' => '5000',
            'info_time' => 'info_time2',
            'info_guarantee' => 'info_guarantee2',
            'info_custom' => 'info_custom2',
        ]);
        DB::table('breaking_device')->insert([
            'device_id' => '2',
            'breaking_id' => '1',
            'min_price' => '200|300',
            'max_price' => '3000',
            'info_time' => 'info_time3',
            'info_guarantee' => 'info_guarantee3',
            'info_custom' => 'info_custom3',
        ]);
        DB::table('breaking_device')->insert([
            'device_id' => '2',
            'breaking_id' => '2',
            'min_price' => '700',
            'max_price' => '3000',
            'info_time' => 'info_time4',
            'info_guarantee' => 'info_guarantee4',
            'info_custom' => 'info_custom4',
        ]);

        //
    }
}

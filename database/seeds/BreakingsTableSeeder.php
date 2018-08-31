<?php

use Illuminate\Database\Seeder;

class BreakingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('breakings')->insert([
            'name' => 'Разбит экран / стекло'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Замена задней камеры'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Не работает кнопка включения'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Замена аккумулятора'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Замена передней камеры'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Замена корпуса'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Плохо слышно собеседника'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Не заряжается'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Настройка iPhone / iOS'
        ]);
        DB::table('breakings')->insert([
            'name' => 'Попала вода'
        ]);
        //
    }
}

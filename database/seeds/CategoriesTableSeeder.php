<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'iphone',
            'image' => 'photos/1/bg3.png',
        ]);
        DB::table('categories')->insert([
            'name' => 'ipad',
            'image' => 'photos/1/ipad4.jpg',
        ]);
        //
    }
}

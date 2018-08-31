<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'mail@mail.ru',
            'password' => bcrypt('admin')
        ]);
        $this->call(DevicesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(BreakingsTableSeeder::class);
        $this->call(BreakingDeviceTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
    }
}

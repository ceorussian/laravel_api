<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'abc@gmail.com',
            'password' => bcrypt('123123'),
            'role' => 1,
        ]);
    }
}

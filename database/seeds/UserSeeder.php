<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'user123',
            "name" => 'Trần Trung',
            'email' => 'user123@gmail.com',
            'password' => Hash::make('user123'),
        ]);
        DB::table('admin')->insert([
            'username' => 'admin123',
            "name" => 'Trần Hoàng',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
    }
}
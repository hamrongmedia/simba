<?php

use Illuminate\Database\Seeder;

class ActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->insert([
            "name" => 'create-admin',
        ]);
        DB::table('actions')->insert([
            "name" => 'view-admin',
        ]);
        DB::table('actions')->insert([
            "name" => 'edit-admin',
        ]);
        DB::table('actions')->insert([
            "name" => 'create-post',
        ]);
        DB::table('actions')->insert([
            "name" => 'view-post',
        ]);
        DB::table('actions')->insert([
            "name" => 'delete-post',
        ]);

    }
}
<?php

use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('post_category')->insert([
            'id' => 1,
            'name' => 'Root 1',
            'parent_id' => null,
            'sort' => 1,
        ]);
    }
}
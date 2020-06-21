<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('menu')->insert([
            'id' => 1,
            'name' => 'Root 1',
            'parent_id' => null,
            'sort' => 1,
        ]);

        DB::table('menu')->insert([
            'id' => 2,
            'name' => 'Root 2',
            'parent_id' => null,
            'sort' => 2,
        ]);

        DB::table('menu')->insert([
            'id' => 3,
            'name' => 'Root 3',
            'parent_id' => null,
            'sort' => 3,
        ]);

        DB::table('menu')->insert([
            'id' => 4,
            'name' => 'Root 4',
            'parent_id' => null,
            'sort' => 4,
        ]);

        DB::table('menu')->insert([
            'id' => 5,
            'name' => 'Root 5',
            'parent_id' => null,
            'sort' => 5,
        ]);

        DB::table('menu')->insert([
            'id' => 6,
            'name' => 'Level 1',
            'parent_id' => '1',
            'sort' => 1,
        ]);
        DB::table('menu')->insert([
            'id' => 7,
            'name' => 'Level 1',
            'parent_id' => '1',
            'sort' => 2,
        ]);
        DB::table('menu')->insert([
            'id' => 8,
            'name' => 'Level 1',
            'parent_id' => '1',
            'sort' => 3,
        ]);

        DB::table('menu')->insert([
            'id' => 9,
            'name' => 'Level 1',
            'parent_id' => '2',
            'sort' => 1,
        ]);
        DB::table('menu')->insert([
            'id' => 10,
            'name' => 'Level 1',
            'parent_id' => '2',
            'sort' => 2,
        ]);
        DB::table('menu')->insert([
            'id' => 11,
            'name' => 'Level 1',
            'parent_id' => '2',
            'sort' => 3,
        ]);

        DB::table('menu')->insert([
            'id' => 12,
            'name' => 'Level 2',
            'parent_id' => '9',
            'sort' => 1,
        ]);
        DB::table('menu')->insert([
            'id' => 13,
            'name' => 'Level 2',
            'parent_id' => '9',
            'sort' => 2,
        ]);
        DB::table('menu')->insert([
            'id' => 14,
            'name' => 'Level 2',
            'parent_id' => '9',
            'sort' => 3,
        ]);

    }
}
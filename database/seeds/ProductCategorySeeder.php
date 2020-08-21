<?php

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_categories')->insert([
            [
                'name' => 'Quần áo',
                'slug' => 'quan-ao',
            ],
            [
                'name' => 'Giày dép',
                'slug' => 'giay-dep',
            ],
            [
                'name' => 'Quần áo',
                'slug' => 'quan-ao',
            ],
            [
                'name' => 'Thời trang',
                'slug' => 'thoi-trang',
            ],
        ]);
    }
}

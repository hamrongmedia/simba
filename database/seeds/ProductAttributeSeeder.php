<?php

use Illuminate\Database\Seeder;

class ProductAttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_attributes')->insert([
            [ 'name' => 'Color' ],
            [ 'name' => 'Size' ]
        ]);
    }
}

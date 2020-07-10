<?php

use Illuminate\Database\Seeder;

class ProductAttributeValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_attribute_values')->insert([
            [ 'attribute_id' => 1 , 'value' => 'Red' ],
            [ 'attribute_id' => 1 , 'value' => 'Blue' ],
            [ 'attribute_id' => 1 , 'value' => 'Black' ],
            [ 'attribute_id' => 1 , 'value' => 'Pink' ],
            [ 'attribute_id' => 2 , 'value' => 'X' ],
            [ 'attribute_id' => 2 , 'value' => 'M' ],
            [ 'attribute_id' => 2 , 'value' => 'L' ],
            [ 'attribute_id' => 2 , 'value' => 'XL' ],
        ]);
    }
}

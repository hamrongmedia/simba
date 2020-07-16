<?php

use Illuminate\Database\Seeder;

class ProductReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $limit = 20;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('product_reviews')->insert([
                'product_id' => 1,
                'comment' => $faker->realText($maxNbChars = 50, $indexSize = 2),
                'customer_phone' => $faker->phoneNumber,
                'customer_email' => $faker->email,
                'customer_name' => $faker->name,

            ]);
        }
    }
}
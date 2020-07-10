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
        $this->call(UserSeeder::class);
        $this->call(ActionSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(PaymendMethodSeeder::class);
        $this->call(PaymendMethodSeeder::class);
        $this->call(ProductAttributeSeeder::class);
        $this->call(ProductAttributeValueSeeder::class);
        $this->call(ProductInfoSeeder::class);
    }
}
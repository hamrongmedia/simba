<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            [ 'name' => 'Đơn hàng mới'],
            [ 'name' => 'Chờ giao hàng'],
            [ 'name' => 'Thành công '],
            [ 'name' => 'Hủy bỏ'],
        ]);
    }
}

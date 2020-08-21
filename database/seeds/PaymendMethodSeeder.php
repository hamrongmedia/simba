<?php

use Illuminate\Database\Seeder;

class PaymendMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_methods')->insert([
            [
                'name' => 'Tiền mặt',
                'description' => 'Sử dụng thẻ ATM hoặc dịch vụ Internet Banking để tiến hành chuyển khoản cho chúng tôi',
            ],
            [
                'name' => 'Chuyển khoản',
                'description' => 'Sử dụng thẻ ATM hoặc dịch vụ Internet Banking để tiến hành chuyển khoản cho chúng tôi',
            ],
            [
                'name' => 'Thu tiền tại nhà (COD)',
                'description' => 'Khách hàng thanh toán bằng tiền mặt cho nhân viên giao hàng khi sản phẩm được chuyển tới địa chỉ nhận hàng',
            ]
        ]);
    }
}

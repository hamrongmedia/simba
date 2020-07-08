<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVoucherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_voucher', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->bigInteger('voucher_id')->unsigned();

            $table->foreign('product_id')->referrences('id')->on('products')->onDelete('cascade');
            $table->foreign('voucher_id')->referrences('id')->on('voucher')->onDelete('cascade');

            $table->unique(['product_id', 'voucher_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_voucher');
    }
}
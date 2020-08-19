<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_status', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name',30);
            $table->tinyInteger('sort_order')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::create('payment_methods', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 150);
            $table->string('description');
            $table->tinyInteger('sort_order')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('fullname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',14)->nullable();
            $table->string('company_name',14)->nullable();
            $table->string('address')->nullable();
            $table->string('message')->nullable();
            $table->string('order_code')->nullable();
            $table->integer('subtotal')->default(0);
            $table->integer('delivery_fee_total')->default(0);
            $table->integer('payment_total')->default(0);
            $table->tinyInteger('order_status_id')->unsigned();
            $table->integer('payment_method_id')->unsigned();
            $table->bigInteger('province_id')->unsigned();
            $table->bigInteger('district_id')->unsigned();
            $table->bigInteger('ward_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('order_status_id')->references('id')->on('order_status')->onDelete('cascade');
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('ward_id')->references('id')->on('wards')->onDelete('cascade');
        });

        Schema::create('order_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id')->unsigned()->nullable();
            $table->integer('product_id')->unsigned()->nullable();
            $table->tinyInteger('product_type')->default(1);
            $table->integer('attribute_value1')->nullable();
            $table->integer('attribute_value2')->nullable();
            $table->integer('price');
            $table->integer('quantity');
            $table->string('product_name')->nullable();
            $table->string('product_code')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_status');
        Schema::dropIfExists('payment_methods');
    }
}

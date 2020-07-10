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
            $table->string('thumbnail');
            $table->string('description');
            $table->string('content')->nullable();
            $table->tinyInteger('sort_order')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone',14)->nullable();
            $table->string('company_name',14)->nullable();
            $table->string('address')->nullable();
            $table->string('message')->nullable();
            $table->string('order_code')->nullable();
            $table->integer('subtotal');
            $table->integer('delivery_fee_total');
            $table->integer('total');
            $table->integer('payment_total');
            $table->tinyInteger('order_status_id')->unsigned();
            $table->integer('payment_method_id')->unsigned();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
            $table->foreign('order_status_id')->references('id')->on('order_status')->onDelete('cascade');
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

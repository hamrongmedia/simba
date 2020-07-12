<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('cart_key')->nullable();
            $table->integer('total_price');
            $table->integer('delivery_fee_total')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        /* Create Relationship Database Table Cart Items */

        Schema::create('cart_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->integer('cart_id')->unsigned()->nullable();
            $table->tinyInteger('product_type')->default(1);
            $table->integer('attribute_value1')->nullable();
            $table->integer('attribute_value2')->nullable();
            $table->integer('price');
            $table->integer('promotion_price')->nullable();
            $table->integer('quantity')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();

            $table->foreign('product_id')->references('id') ->on('products') ->onDelete('cascade'); 
            $table->foreign('cart_id')->references('id')->on('carts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_items');
        Schema::dropIfExists('carts');
    }
}

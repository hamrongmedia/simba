<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        /* Create Master Database Table Products */
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('slug');
            $table->string('product_code',20)->nullable();
            $table->text('description')->nullable();
            $table->integer('price')->default(0);
            $table->integer('sale_price')->nullable()->default(0);
            $table->mediumText('content')->nullable();
            $table->string('thumbnail')->nullable();
            $table->tinyInteger('type')->comment('1:Default, 2:Attribute')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->boolean('delete_flag')->default(0);
            $table->timestamps();
        });

        /* Create Relationship Database Table Product Images */

        Schema::create('product_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->unsigned();
            $table->string('image_file');
            $table->tinyInteger('sort_order')->default(1);
            $table->timestamps();

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
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('products');
    }
}
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

        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('name');
            $table->longText('description');
            $table->unsignedInteger('type_id');
            // $table->unsignedInteger('category_id');
            $table->integer('price');
            $table->integer('promotion_price');
            $table->longText('images');
            $table->integer('quantity');
            $table->longText('attribute');
            $table->string('meta_keyword');
            $table->string('meta_title');
            $table->string('meta_description');
            $table->integer('status');
            $table->integer('is_deleted');
            $table->integer('view');
            
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')
                ->on('product_types')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
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
        Schema::create('product_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_type_name');
            $table->string('description');
        });

        Schema::create('product_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_category_name');
            $table->timestamps();
        });

        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('description');
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('price');
            $table->timestamps();

            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_type')
                ->onDelete('cascade');
        });

        Schema::create('product_has_category', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('product_id')
                ->references('id')
                ->on('product')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('product_category')
                ->onDelete('cascade');
        });

        // Dynamic custom attributes management

        Schema::create('product_attribute', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('attribute_name');
            $table->string('attribute_data_type');
            $table->string('description');
        });

        Schema::create('attribute_value', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attribute_id');
            $table->string('attribute_value');
            $table->string('description');

            $table->foreign('attribute_id')
                ->references('id')
                ->on('product_attribute')
                ->onDelete('cascade');
        });

        Schema::create('product_has_attribute_value', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_value_id');

            $table->foreign('product_id')
                ->references('id')
                ->on('product')
                ->onDelete('cascade');

            $table->foreign('attribute_value_id')
                ->references('id')
                ->on('attribute_value')
                ->onDelete('cascade');

        });

        Schema::create('product_type_has_attribute_value', function (Blueprint $table) {
            $table->unsignedBigInteger('product_type_id');
            $table->unsignedBigInteger('attribute_value_id');

            $table->foreign('product_type_id')
                ->references('id')
                ->on('product_type')
                ->onDelete('cascade');

            $table->foreign('attribute_value_id')
                ->references('id')
                ->on('attribute_value')
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('product');
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('product_has_category');
        Schema::dropIfExists('product_attribute');
        Schema::dropIfExists('attribute_value');
        Schema::dropIfExists('product_type');
        Schema::dropIfExists('product_has_attribute_value');
        Schema::dropIfExists('product_type_has_attribute_value');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
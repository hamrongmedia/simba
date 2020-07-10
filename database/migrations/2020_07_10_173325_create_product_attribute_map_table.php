<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_map', function (Blueprint $table) {
            $table->integer('product_id')->unsigned();
            $table->integer('product_attribute_id')->unsigned();

            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); 
            $table->foreign('product_attribute_id')
                ->references('id')
                ->on('product_attributes')
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
        Schema::dropIfExists('product_attribute_map');
    }
}

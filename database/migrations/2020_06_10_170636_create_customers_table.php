<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Create Master Database Table Customers */

        // Schema::create('customers', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('fullname')->nullable();
        //     $table->string('user_name',20)->unique();
        //     $table->string('email',100)->unique();
        //     $table->string('password');
        //     $table->date('birthday')->nullable();
        //     $table->string('phone',15)->nullable();
        //     $table->string('avatar')->nullable();
        //     $table->tinyInteger('gender')->nullable();
        //     $table->integer('point')->default(0);
        //     $table->string('app_id',15)->nullable();
        //     $table->string('facebook_id',30)->nullable();
        //     $table->string('google_id',30)->nullable();
        //     $table->string('zalo_id',30)->nullable();
        //     $table->string('description')->nullable();
        //     $table->tinyInteger('status')->default(0);
        //     $table->rememberToken();
        //     $table->timestamps();
        // });

        /* Create Master Database Table Customer Addresss */

        // Schema::create('customer_addresses', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->boolean('default_address')->default(0);
        //     $table->string('status', 60)->default(1);
        //     $table->timestamps();
        // }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('customer_addresses');
        // Schema::dropIfExists('customers');
    }
}

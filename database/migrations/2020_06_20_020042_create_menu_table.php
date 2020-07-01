<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('link')->nullable();
            $table->string('icon')->nullable();
            $table->unsignedTinyInteger('sort');
            $table->unsignedMediumInteger('parent_id')->nullable();
            $table->timestamps();
        });

        Schema::create('menu_has_roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('menu_id')
                ->references('id')
                ->on('menu')
                ->onDelete('cascade');

            $table->unsignedSmallInteger('role_id')
                ->references('id')
                ->on('role')
                ->onDelete('cascade');
        });

        Schema::create('menu_has_permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('menu_id')
                ->references('id')
                ->on('menu')
                ->onDelete('cascade');

            $table->unsignedSmallInteger('permission_id')
                ->references('id')
                ->on('permission')
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
        Schema::dropIfExists('menu');
        Schema::dropIfExists('menu_has_roles');
        Schema::dropIfExists('menu_has_permissions');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name');
            $table->timestamps();
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('guard_name')->nullable();
            $table->timestamps();
        });

        Schema::create('actions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('permission_has_action', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('action_id');
            $table->timestamps();
            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('action_id')
                ->references('id')
                ->on('actions')
                ->onDelete('cascade');
        });

        Schema::create('user_has_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('admin')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('user_has_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('role_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('admin')
                ->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('role_has_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('role_id');

            $table->foreign('permission_id')
                ->references('id')
                ->on('permissions')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
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
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('role_has_permissions');
        Schema::dropIfExists('user_has_permissions');
        Schema::dropIfExists('user_has_roles');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('actions');
        Schema::dropIfExists('permission_has_action');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
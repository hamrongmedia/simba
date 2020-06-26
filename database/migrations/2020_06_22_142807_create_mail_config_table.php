<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMailConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_config', function (Blueprint $table) {
            $table->id();
            $table->string('mail_from_adress')->nullable();
            $table->string('mail_from_name')->nullable();
            $table->string('mail_username')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('mail_mailer')->nullable();
            $table->string('mail_smpt_host')->nullable();
            $table->string('mail_encryption')->nullable();
            $table->unsignedInteger('mail_port')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mail_config');
    }
}
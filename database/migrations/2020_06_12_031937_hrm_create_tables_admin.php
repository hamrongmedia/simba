<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HrmCreateTablesAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('title');
            $table->string('image', 200)->nullable(); // Nếu bài post có 2 image trở lên se lỗi. mà post thì k cần image cx dc
            $table->string('description', 300)->nullable();
            $table->text('content')->nullable();
            $table->integer('cat_id')->nullable(); // 1 post có thể có nhiều category
            $table->integer('created_by')->nullable();
            $table->boolean('status'); // nếu có 3 trạng thái trở lên thì lỗi
            $table->text('tags')->nullable();
            $table->string('meta_des')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_title')->nullable();
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('name');
            $table->integer('cat_id')->nullable();
            $table->string('description', 300)->nullable();
            $table->boolean('status'); // nếu có 3 trạng thái trở lên thì lỗi
            $table->string('meta_des')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_title')->nullable();
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
        Schema::dropIfExists('posts');
        Schema::dropIfExists('category');
    }
}
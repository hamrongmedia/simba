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
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
            $table->string('status', 60)->default('published'); // nếu có 3 trạng thái trở lên thì lỗi
            $table->tinyInteger('is_featured')->default(0);
            $table->string('meta_des')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_title')->nullable();
            $table->timestamps();
        });

        Schema::create('category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('name');
            $table->string('description', 300)->nullable();
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('status', 60)->default('published'); // nếu có 3 trạng thái trở lên thì lỗi
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
            $table->tinyInteger('is_featured')->default(0);
            $table->string('meta_des')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_title')->nullable();
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->integer('author_id');
            $table->string('author_type', 255)->default(addslashes(User::class));
            $table->string('description', 400)->nullable()->default('');
            $table->integer('parent_id')->unsigned()->default(0);
            $table->string('status', 60)->default('published');
            $table->string('meta_des')->nullable();
            $table->string('meta_key')->nullable();
            $table->string('meta_title')->nullable();
            $table->timestamps();
        });

        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('tag_id')->unsigned()->references('id')->on('tags')->onDelete('cascade');
            $table->integer('post_id')->unsigned()->references('id')->on('posts')->onDelete('cascade');
        });

        Schema::create('post_categories', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned()->references('id')->on('category')->onDelete('cascade');
            $table->integer('post_id')->unsigned()->references('id')->on('posts')->onDelete('cascade');
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
        Schema::dropIfExists('post_categories');
        Schema::dropIfExists('category');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('post_tags');
    }
}
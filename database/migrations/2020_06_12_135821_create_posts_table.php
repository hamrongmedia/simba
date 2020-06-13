<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('post', function (Blueprint $table) {
            $table->id();

            $table->string('author_model');
            $table->unsignedBigInteger('author_id');

            $table->string('title');
            $table->string('slug');
            $table->string('meta_title');
            $table->text('cotent');

            $table->dateTime('create_at');
            $table->dateTime('published_at');
            $table->datetime('updated_at');

        });

        Schema::create('post_category', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('parent_id');
            $table->string('title');

            $table->string('slug');
            $table->string('meta_title');
            $table->text('cotent');

            $table->dateTime('create_at');
            $table->datetime('updated_at');

            $table->foreign('parent_id')
                ->references('id')
                ->on('post_category')
                ->onDelete('cascade');

        });

        Schema::create('post_has_category', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('post_id')
                ->references('id')
                ->on('post')
                ->onDelete('cascade');

            $table->foreign('category_id')
                ->references('id')
                ->on('post_category')
                ->onDelete('cascade');

        });

        Schema::create('post_meta', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->string('key');
            $table->text('content');
            $table->timestamps();

            $table->foreign('post_id')
                ->references('id')
                ->on('post')
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
        Schema::dropIfExists('post');
        Schema::dropIfExists('post_category');
        Schema::dropIfExists('category');
        Schema::dropIfExists('post_meta');
        Schema::dropIfExists('post_has_category');

        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('post_title', 1000);
            $table->string('post_content', 1000);
            $table->text('post_category');
            $table->string('thumbnail', 1000);
            $table->string('post_slug', 1000);
            $table->integer('post_author');
            $table->text('post_tags');
            $table->string('search_keywords');
            $table->boolean('post_status')->default(true);

            $table->bigInteger('post_views')->default(0);
            $table->bigInteger('post_likes')->default(0);
            $table->bigInteger('post_shares')->default(0);
            $table->bigInteger('download_count')->default(0);

            $table->string('meta_title', 1000);
            $table->string('meta_description', 1000);
            $table->string('meta_keywords', 1000);

            $table->bigInteger('png_file_size');
            $table->integer('png_width');
            $table->integer('png_height');
            $table->string('png_mime_type');
            $table->string('png_file_path', 1000);

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
    }
};

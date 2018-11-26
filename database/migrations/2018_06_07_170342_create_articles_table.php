<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('title')->unique();
            $table->string('title_pt')->nullable();
            $table->text('content');
            $table->text('content_pt')->nullable();
            $table->string('image_path')->nullable();
            $table->unsignedInteger('author_id');
            $table->unsignedInteger('topic_id');
            $table->boolean('is_pinned')->default(false);
            $table->unsignedInteger('views')->default(0);
            $table->smallInteger('order')->nullable();
            $table->string('unique_token')->nullable();
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
        Schema::dropIfExists('articles');
    }
}

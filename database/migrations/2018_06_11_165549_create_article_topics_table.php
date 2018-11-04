<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_topics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name')->unique();
            $table->string('name_pt')->nullable();
            $table->timestamps();
        });

        Schema::create('article_article_topic', function (Blueprint $table) {
            $table->unsignedInteger('article_id');
            $table->unsignedInteger('article_topic_id');
            $table->primary(['article_id', 'article_topic_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_topics');
        Schema::dropIfExists('article_article_topics');
    }
}

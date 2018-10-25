<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asanas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('sanskrit');
            $table->string('name')->unique();
            $table->string('also_known_as')->nullable();
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->string('etymology')->nullable();
            $table->unsignedInteger('views_count')->default(0);
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
        Schema::dropIfExists('asanas');
    }
}

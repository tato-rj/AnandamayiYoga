<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('name', 80)->unique();
            $table->string('description');
            $table->string('image_path')->nullable();
            $table->string('video_path')->nullable();
            $table->unsignedInteger('duration');
            $table->unsignedInteger('program_id')->nullable();
            $table->unsignedInteger('order')->nullable();
            $table->boolean('is_free');
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('teacher_id')->nullable();
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
        Schema::dropIfExists('lessons');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 25);
            $table->string('name', 25);
            $table->string('subtitle', 80);
            $table->text('description');
            $table->string('name_pt', 25)->nullable();
            $table->string('subtitle_pt', 80)->nullable();
            $table->text('description_pt')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->timestamps();
        });

        Schema::create('category_user', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('user_id');
            $table->primary(['category_id', 'user_id']);
        });

        Schema::create('category_teacher', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('teacher_id');
            $table->primary(['category_id', 'teacher_id']);
        });

        Schema::create('category_lesson', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('lesson_id');
            $table->primary(['category_id', 'lesson_id']);
        });

        Schema::create('category_program', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('program_id');
            $table->primary(['category_id', 'program_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('category_user');
        Schema::dropIfExists('category_teacher');
        Schema::dropIfExists('category_lesson');
        Schema::dropIfExists('category_program');
    }
}

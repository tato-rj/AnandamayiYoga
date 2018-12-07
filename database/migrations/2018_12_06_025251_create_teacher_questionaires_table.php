<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_questionaires', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('teacher_id')->unique();
            $table->text('questions');
            $table->text('questions_pt')->nullable();
            $table->timestamp('published')->nullable();
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
        Schema::dropIfExists('teacher_questionaires');
    }
}

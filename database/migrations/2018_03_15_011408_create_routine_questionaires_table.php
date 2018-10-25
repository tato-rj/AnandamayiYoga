<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutineQuestionairesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routine_questionaires', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->json('schedule');
            $table->string('duration');
            $table->string('age');
            $table->string('level');
            $table->json('categories');
            $table->string('lifestyle');
            $table->string('reason')->nullable();
            $table->json('practice');
            $table->json('physical');
            $table->json('mental');
            $table->json('spiritual');
            $table->timestamp('completed_at')->nullable();
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
        Schema::dropIfExists('routine_questionaires');
    }
}

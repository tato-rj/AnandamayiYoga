<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('lesson_level', function (Blueprint $table) {
            $table->unsignedInteger('level_id');
            $table->unsignedInteger('lesson_id');
            $table->primary(['level_id', 'lesson_id']);
        });

        Schema::create('asana_level', function (Blueprint $table) {
            $table->unsignedInteger('level_id');
            $table->unsignedInteger('asana_id');
            $table->primary(['level_id', 'asana_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
        Schema::dropIfExists('lesson_level');
        Schema::dropIfExists('asana_level');
    }
}

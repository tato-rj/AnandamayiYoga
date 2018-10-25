<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('routines', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('request_id')->unique();
            $table->unsignedInteger('user_id')->unique();
            $table->text('comment')->nullable();
            $table->string('video_path')->nullable();
            $table->timestamp('started_at')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->unsignedInteger('views_count')->default(0);
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lesson_id');
            $table->unsignedInteger('routine_id');
            $table->timestamp('day');
            $table->string('time');
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
        Schema::dropIfExists('routines');
        Schema::dropIfExists('schedules');
    }
}

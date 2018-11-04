<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');

            $table->string('name', 80)->unique();
            $table->string('name_pt', 80)->nullable();

            $table->text('description');
            $table->text('description_pt')->nullable();

            $table->string('video_path')->nullable();
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('programs');
    }
}

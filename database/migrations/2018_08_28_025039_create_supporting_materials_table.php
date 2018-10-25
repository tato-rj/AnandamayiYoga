<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportingMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supporting_materials', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('chapter_id');
            $table->string('name');
            $table->string('file_path');
            $table->unsignedInteger('downloads')->default(0);
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
        Schema::dropIfExists('supporting_materials');
    }
}

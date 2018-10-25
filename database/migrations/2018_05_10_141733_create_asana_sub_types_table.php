<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsanaSubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asana_sub_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->tinyInteger('order')->nullable();
            $table->timestamps();
        });

        Schema::create('asana_asana_sub_type', function (Blueprint $table) {
            $table->unsignedInteger('asana_id');
            $table->unsignedInteger('asana_sub_type_id');
            $table->primary(['asana_id', 'asana_sub_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asana_sub_types');
        Schema::dropIfExists('asana_asana_sub_type');
    }
}

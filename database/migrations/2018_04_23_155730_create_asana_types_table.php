<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsanaTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asana_types', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');

            $table->string('name')->unique();
            $table->string('name_pt')->nullable();

            $table->tinyInteger('order')->nullable();
            $table->timestamps();
        });

        Schema::create('asana_asana_type', function (Blueprint $table) {
            $table->unsignedInteger('asana_id');
            $table->unsignedInteger('asana_type_id');
            $table->primary(['asana_id', 'asana_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asana_types');
        Schema::dropIfExists('asana_asana_type');
    }
}

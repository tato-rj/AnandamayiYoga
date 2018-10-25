<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('avatar_path')->nullable();
            $table->unsignedInteger('level_id')->nullable();
            $table->string('gender')->nullable();
            $table->string('lang')->default('en');
            $table->string('timezone')->default('UTC');
            $table->string('currency')->default('usd');
            $table->string('password');
            $table->string('confirmation_token', 25)->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->timestamp('trial_ends_at')->nullable();
            $table->boolean('confirmed')->default(false);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

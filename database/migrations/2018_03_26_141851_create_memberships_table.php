<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->boolean('active')->default(false);
            $table->timestamp('next_payment_at')->nullable();
            $table->timestamp('subscription_ends_at')->nullable();
            $table->timestamp('canceled_at')->nullable();
            $table->string('stripe_id')->nullable();
            $table->string('stripe_subscription')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable(); 
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
        Schema::dropIfExists('memberships');
    }
}

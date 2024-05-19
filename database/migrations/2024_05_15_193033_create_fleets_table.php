<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFleetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fleets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('price'); // per mile
            $table->boolean('meet_and_greet')->default(0);
            $table->string('meet_and_greet_price')->default(0);
            $table->string('max_passengers')->nullable();
            $table->string('max_suitecases')->nullable();
            $table->string('max_hand_luggage')->nullable();
            $table->text('features')->nullable();
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
        Schema::dropIfExists('fleets');
    }
}

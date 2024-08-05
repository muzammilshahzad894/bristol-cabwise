<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('other_name')->nullable();
            $table->string('other_email')->nullable();
            $table->string('other_phone_number')->nullable();
            $table->integer('is_childseat')->nullable();
            $table->integer('is_meet_nd_greet')->nullable();
            $table->string('pickup_location')->nullable();
            $table->string('dropoff_location')->nullable();
            $table->string('booking_date')->nullable();
            $table->string('booking_time')->nullable();
            $table->string('fleet_id')->nullable();
            $table->string('service_id')->nullable();
            $table->string('return_id')->nullable();
            $table->integer('no_of_passenger');
            $table->integer('no_suit_case')->nullable();
            $table->text('summary')->nullable();
            $table->text('via_locations')->nullable();
            $table->integer('no_of_laugage')->nullable();
            $table->string('flight_time')->nullable();
            $table->string('flight_name')->nullable();
            $table->string('flight_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->integer('is_payment')->default(0);
            $table->integer('is_draft')->default(1);
            $table->integer('user_id')->nullable();
            $table->integer('user_ip')->nullable();
            $table->string('total_price')->nullable();
            $table->boolean('reminder_sent')->default(false);
            $table->integer('assigned_to')->nullable();
            $table->integer('status_id')->default(1);
            $table->integer('is_extra_lauggage')->default(0);
            
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
        Schema::dropIfExists('bookings');
    }
}

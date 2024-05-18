<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('tag')->nullable();
            $table->text('short_description')->nullable();
            $table->string('image')->nullable();
            $table->string('detail_page_tag')->nullable();
            $table->string('detail_page_first_heading')->nullable();
            $table->string('detail_page_second_heading')->nullable();
            $table->text('detail_page_description')->nullable();
            $table->text('detail_page_features')->nullable();
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
        Schema::dropIfExists('services');
    }
}

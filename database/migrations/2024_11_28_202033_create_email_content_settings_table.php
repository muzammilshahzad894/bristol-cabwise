<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailContentSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_content_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();  // always will be the same as define in seeder
            $table->string('subject')->nullable();
            $table->text('introductory_message')->nullable();
            $table->text('note')->nullable();
            $table->text('closing_text')->nullable();
            $table->integer('display_order')->default(0);
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
        Schema::dropIfExists('email_content_settings');
    }
}

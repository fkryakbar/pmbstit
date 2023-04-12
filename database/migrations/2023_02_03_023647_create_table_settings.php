<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_settings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('batch');
            $table->string('brochure');
            $table->string('whatsapp_group')->nullable();
            $table->string('information')->nullable();
            $table->string('contact_person_1');
            $table->string('contact_person_2');
            $table->string('contact_person_3');
            $table->string('allow_to_edit');
            $table->string('show_registration_result');
            $table->string('open_registration');
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
        Schema::dropIfExists('table_settings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->id();
            $table->string('registration_id')->unique();
            $table->string('registration_status');
            $table->string('user_id');
            $table->string('study_program');
            $table->string('full_name');
            $table->string('place_of_birth');
            $table->string('date_of_birth');
            $table->string('nisn');
            $table->string('gender');
            $table->string('id_number');
            $table->string('graduate_from');
            $table->string('highschool_program');
            $table->string('year_of_graduate');
            $table->string('address');
            $table->string('phone_number');
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
        Schema::dropIfExists('form');
    }
}

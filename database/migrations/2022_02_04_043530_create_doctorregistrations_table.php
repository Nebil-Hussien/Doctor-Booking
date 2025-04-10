<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorregistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorregistrations', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->enum('type',['md','seniormd'])->default('md');
            $table->string('registrationid');
            $table->date('year_of_registration');
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
        Schema::dropIfExists('doctorregistrations');
    }
}

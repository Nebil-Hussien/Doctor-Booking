<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorseducationdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorseducationdetails', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->enum('type',['md','seniormd'])->default('md');
            $table->string('degree');
            $table->string('college');
            $table->date('year_of_completion');
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
        Schema::dropIfExists('doctorseducationdetails');
    }
}

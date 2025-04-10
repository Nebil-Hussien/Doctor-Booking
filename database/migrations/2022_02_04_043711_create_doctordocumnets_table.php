<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctordocumnetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctordocumnets', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->enum('type',['md','seniormd'])->default('md');
            $table->string('document_name')->nullable();
            $table->string('document_path');
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
        Schema::dropIfExists('doctordocumnets');
    }
}

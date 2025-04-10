<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorachievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctorachievements', function (Blueprint $table) {
            $table->id();
            $table->string('doctor_id');
            $table->enum('type',['md','seniormd'])->default('md');
            $table->string('award_name');
            $table->date('award_year');
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
        Schema::dropIfExists('doctorachievements');
    }
}

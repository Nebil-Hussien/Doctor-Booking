<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMddoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mddoctors', function (Blueprint $table) {
            $table->id();
            $table->string('seniormds');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('profile');
            $table->enum('gender', ['male', 'female'])->default('male');
            $table->string('phone');
            $table->string('address');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_online')->default(0);
            $table->boolean('approval_by_admin')->default(0);

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
        Schema::dropIfExists('mddoctors');
    }
}

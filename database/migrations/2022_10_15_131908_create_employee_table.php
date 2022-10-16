<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('fname');
            $table->string('lname');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('depId')->nullable();
            $table->foreign('depId')->references('id')->on('departments');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee');
    }
};

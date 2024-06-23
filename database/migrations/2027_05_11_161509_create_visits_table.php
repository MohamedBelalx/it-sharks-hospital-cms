<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->timestamp('time');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('nurse_id');
            $table->unsignedBigInteger('patient_id');
            $table->foreign('doctor_id')->references('id')->on('users');
            $table->foreign('nurse_id')->references('id')->on('users');
            $table->foreign('patient_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};

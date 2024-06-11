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
        Schema::create('nurse_surgery', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nurse_id');
            $table->unsignedBigInteger('surgery_id');
            $table->foreign('nurse_id')->references('id')->on('users');
            $table->foreign('surgery_id')->references('id')->on('surgery');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nurse_surgery');
    }
};

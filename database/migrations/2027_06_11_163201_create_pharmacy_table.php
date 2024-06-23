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
        Schema::create('pharmacy', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pharma_id');
            $table->unsignedBigInteger('visit_id');
            $table->text('treatment')->nullable();
            $table->foreign('pharma_id')->references('id')->on('users');
            $table->foreign('visit_id')->references('id')->on('visits');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pharmacy');
    }
};

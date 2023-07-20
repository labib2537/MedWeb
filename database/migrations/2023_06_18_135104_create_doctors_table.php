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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name', 255);
            $table->string('specialist', 100);
            $table->string('email', 255);
            $table->string('Experiences_Summary', 100);
            $table->json('practice_days')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('image', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
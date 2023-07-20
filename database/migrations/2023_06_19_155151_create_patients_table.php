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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('patient_name', 100);
            $table->integer('age');
            $table->string('address', 255);
            $table->string('phone', 11);
            $table->string('date', 100);
            $table->string('room');
            $table->string('bill');
            $table->string('status');
            $table->string('status_color');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};

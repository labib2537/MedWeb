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
        Schema::create('bed_patients', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->unsignedBigInteger('cabin_id');
            $table->string('age');
            $table->string('phone');
            $table->string('address');
            $table->string('date');
            $table->string('room');
            $table->timestamps();

            $table->foreign('cabin_id')
                  ->references('id')
                  ->on('bed_allotments')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bed_patients');
    }
};

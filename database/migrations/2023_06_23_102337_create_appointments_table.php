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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('doctor_id');
            $table->string('patient_name');
            $table->string('doctor_name');
            $table->string('specialist');
            $table->string('phone');
            $table->string('gender');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->tinyInteger('is_active')->default(0);
            $table->tinyInteger('delete')->default(0);
            $table->date('date');
            $table->time('time');
            $table->timestamps();
            $table->foreign('doctor_id')
                  ->references('id')
                  ->on('doctors')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
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
        Schema::create('test_reports', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('patient_name', 100);
            $table->string('test_name');
            $table->string('address', 255);
            $table->string('phone', 11);
            $table->string('date', 100);
            $table->string('report_file',255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('test_reports');
    }
};

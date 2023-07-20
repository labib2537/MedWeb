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
        Schema::create('bed_allotments', function (Blueprint $table) {
            $table->id();
            $table->string('cabin_number');
            $table->string('cabin_type');
            $table->tinyInteger('is_active')->default(0);
            $table->timestamp('change_status_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bed_allotments');
    }
};

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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('name', 100);
            $table->string('heading', 150);
            $table->string('paragraph', 255);
            $table->string('src', 255);
            $table->string('alt', 100);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('change_status_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};

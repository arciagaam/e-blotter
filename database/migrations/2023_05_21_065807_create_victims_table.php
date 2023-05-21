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
        Schema::create('victims', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained('records')->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('civil_status_id')->constrained('civil_status')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('name');
            $table->integer('age');
            $table->tinyInteger('sex');
            $table->string('contact_number');
            $table->string('address');
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('victims');
    }
};

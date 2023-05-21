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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangay_id')->constrained('barangays')->cascadeOnUpdate()->restrictOnDelete();
            // $table->foreignId('victim_id')->constrained('victims')->cascadeOnUpdate()->restrictOnDelete();
            // $table->foreignId('suspect_id')->constrained('suspects')->cascadeOnUpdate()->restrictOnDelete();
            $table->string('case');
            $table->text('narrative');
            $table->string('narrative_file')->nullable();
            $table->text('reliefs');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};

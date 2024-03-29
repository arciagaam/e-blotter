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
            $table->foreignId('blotter_status_id')->constrained('blotter_status')->cascadeOnUpdate()->restrictOnDelete();
            $table->integer('barangay_blotter_number')->default(1);
            $table->string('purok');
            $table->string('case');
            $table->text('narrative');
            $table->string('narrative_file')->nullable();
            $table->text('reliefs')->nullable();
            $table->date('kp_deadline')->nullable();
            $table->boolean('notification_viewed')->default(0);
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

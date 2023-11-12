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
        Schema::create('issued_kp_forms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->nullable()->constrained('records')->cascadeOnUpdate();
            $table->foreignId('kp_form_id')->nullable()->constrained('kp_forms')->cascadeOnUpdate();
            $table->boolean('notification_viewed')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_kp_forms');
    }
};

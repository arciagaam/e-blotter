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
        Schema::create('summons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained('records');
            $table->foreignId('kp_form_id')->constrained('kp_forms');
            $table->integer('attempt')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summons');
    }
};

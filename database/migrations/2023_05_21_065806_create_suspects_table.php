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
        Schema::create('suspects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained('records')->cascadeOnUpdate()->restrictOnDelete();
            $table->string("first_name")->nullable();
            $table->string("middle_name")->nullable();
            $table->string("last_name")->nullable();
            $table->tinyInteger('sex');
            $table->string('barangay');
            $table->string('municipality');
            $table->string('province');
            $table->timestamps();
        });
    }

    // "suspect_name" => 'required',
    // "suspect_sex" => 'required',
    // "suspect_address" => 'required',

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suspects');
    }
};

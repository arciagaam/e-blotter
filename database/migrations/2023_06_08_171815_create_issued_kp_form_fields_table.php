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
        Schema::create('issued_kp_form_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('issued_kp_form_id')->nullable()->constrained('issued_kp_forms')->cascadeOnUpdate();
            $table->string('tag_id');
            $table->text('value');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issued_kp_form_fields');
    }
};

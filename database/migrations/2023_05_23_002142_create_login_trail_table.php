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
        Schema::create('login_trail', function (Blueprint $table) {
            $table->id();
            $table->foreignId('barangay_id')->nullable()->constrained('barangays')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('login_role_id')->nullable()->constrained('login_roles')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('login_trail');
    }
};

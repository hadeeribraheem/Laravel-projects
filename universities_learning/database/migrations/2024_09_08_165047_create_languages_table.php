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
        Schema::create('languages', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('prefix'); // Language prefix (e.g., 'en', 'ar')
            $table->string('name'); // Language name (e.g., 'English', 'Arabic')
            $table->timestamps(); // Adds 'created_at' and 'updated_at' fields
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};

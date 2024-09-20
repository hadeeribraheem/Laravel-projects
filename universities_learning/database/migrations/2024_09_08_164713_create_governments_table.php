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
        Schema::create('governments', function (Blueprint $table) {
            $table->id();
            $table->text('name'); // Column for government name
            $table->text('info')->nullable(); // Nullable info column
            //$table->
            $table->softDeletes(); // Soft deletes for the table
            $table->timestamps(); // Timestamps (created_at and updated_at)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('governments');
    }
};

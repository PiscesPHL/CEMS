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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id(); // Added Primary Key
            $table->string('name'); // Added Name column
            $table->string('acronym')->nullable();
            $table->string('description')->nullable();
            
            // Fixed typos in category (e.g., Religions -> Religious)
            $table->enum('category', ['Academic', 'Religious', 'Sports', 'Cultural'])->nullable(); 
            
            // Changed the second 'category' to 'status' and gave it a default value
            $table->enum('status', ['Active', 'Inactive'])->default('Active'); 
            
            $table->timestamps(); // Added created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
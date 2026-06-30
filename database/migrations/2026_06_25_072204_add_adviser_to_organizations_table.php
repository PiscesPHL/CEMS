<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            // Adds adviser_id and links it to the users table
            // 'nullOnDelete' means if the faculty member is deleted, the org adviser just becomes empty
            $table->foreignId('adviser_id')->nullable()->constrained('users')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('organizations', function (Blueprint $table) {
            $table->dropForeign(['adviser_id']);
            $table->dropColumn('adviser_id');
        });
    }
};
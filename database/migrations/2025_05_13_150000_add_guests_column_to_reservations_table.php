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
        // We don't need this migration since party_size already exists
        // and serves the same purpose as guests
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to drop the column since we're not adding it
    }
};

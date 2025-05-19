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
        Schema::table('translations', function (Blueprint $table) {
            $table->index(['table_name', 'foreign_key']); // For model relationships
            $table->index(['foreign_key', 'column_name', 'locale']); // For frequent partial searches
            $table->index('locale'); // For language filters
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('translations');
    }
};

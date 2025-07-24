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
        Schema::create('artwork_tags', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('artwork_id')->constrained()->onDelete('cascade');
            $table->foreignUuid('tag_id')->constrained()->onDelete('cascade');
            $table->unique(['artwork_id', 'tag_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artwork_tags');
    }
};

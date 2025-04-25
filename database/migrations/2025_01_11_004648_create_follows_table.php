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
        Schema::create('follows', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->foreignUlid('follower_id')->constrained('users')->onDelete('cascade');
            $table->foreignUlid('followed_id')->constrained('users')->onDelete('cascade');
            $table->unique(['follower_id', 'followed_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('follows');
    }
};

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
            $table->id();
            $table->timestamps();
            $table->foreignId('id_follower')->constrained('users')->onDelete('cascade');
            $table->foreignId('id_followed')->constrained('users')->onDelete('cascade');
            $table->unique(['id_follower', 'id_followed']);
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

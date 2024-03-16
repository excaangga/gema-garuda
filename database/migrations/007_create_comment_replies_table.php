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
        Schema::create('comment_replies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('id_comment')->constrained('comments')->onDelete('cascade');
            $table->text('reply');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_replies');
    }
};

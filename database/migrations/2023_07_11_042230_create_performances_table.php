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
        Schema::create('performances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('office_id')->constrained('offices')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('presence_id')->constrained('presences')->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('total_presence')->nullable();
            $table->integer('total_permit')->nullable();
            $table->time('recap_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('performances');
    }
};

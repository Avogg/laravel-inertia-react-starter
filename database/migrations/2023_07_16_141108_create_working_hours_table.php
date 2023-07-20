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
        Schema::create('working_hours', function (Blueprint $table) {
            $table->id();
            $table->integer('day');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->time('start_time')->default("00:00:00");
            $table->time('end_time')->default("00:00:00");
            $table->time('lunch_start')->default("00:00:00")->nullable();
            $table->time('lunch_end')->default("00:00:00")->nullable();;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('working_hours');
    }
};

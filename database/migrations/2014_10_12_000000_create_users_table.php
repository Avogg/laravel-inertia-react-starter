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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_doctor')->default(false);
            $table->time('monday_starts_at')->nullable();
            $table->time('monday_ends_at')->nullable();
            $table->time('tuesday_starts_at')->nullable();
            $table->time('tuesday_ends_at')->nullable();
            $table->time('wednesday_starts_at')->nullable();
            $table->time('wednesday_ends_at')->nullable();
            $table->time('thursday_starts_at')->nullable();
            $table->time('thursday_ends_at')->nullable();
            $table->time('friday_starts_at')->nullable();
            $table->time('friday_ends_at')->nullable();
            $table->time('saturday_starts_at')->nullable();
            $table->time('sturday_ends_at')->nullable();

            $table->rememberToken();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

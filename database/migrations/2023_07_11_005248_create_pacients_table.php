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
        Schema::create('pacients', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('invoice_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('phone_number_detail')->nullable();
            $table->string('cc')->nullable();
            $table->string('nif')->nullable();
            $table->string('invoice_notes')->nullable();
            $table->string('address')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('locality')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('birth')->nullable();
            $table->boolean('treatment_sheets')->nullable()->default(false);
            $table->boolean('sms_reminders')->nullable()->default(false);
            $table->boolean('email_reminders')->nullable()->default(false);
            $table->boolean('notify_appointment_created')->nullable()->default(false);
            $table->boolean('campaigns')->nullable()->default(false);
            $table->boolean('photo_access')->nullable()->default(false);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacients');
    }
};

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
        Schema::create('spay_neuter_appointments', function (Blueprint $table) {
            $table->id('appointment_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('animal_id')->constrained('animals', 'animal_id')->cascadeOnDelete();
            $table->date('appointment_date');
            $table->enum('procedure_type', ['Spay', 'Neuter']);
            $table->enum('status', ['Scheduled', 'Completed', 'Cancelled'])->default('Scheduled');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spay_neuter_appointments');
    }
};

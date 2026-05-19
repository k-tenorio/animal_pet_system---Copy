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
        Schema::create('adoption_applications', function (Blueprint $table) {
            $table->id('application_id');
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('animal_id')->constrained('animals', 'animal_id')->cascadeOnDelete();
            $table->foreignId('registered_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('contact_number');
            $table->date('birthdate');
            $table->string('civil_status');
            $table->enum('gender', ['Male', 'Female']);
            $table->string('owner_image')->nullable();
            $table->date('zoom_interview_date');
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('adoption_applications');
    }
};

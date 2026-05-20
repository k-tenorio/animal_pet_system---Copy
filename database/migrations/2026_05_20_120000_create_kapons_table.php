<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kapons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('owner_name');
            $table->string('owner_email');
            $table->string('owner_mobile');
            $table->text('owner_address')->nullable();

            $table->string('pet_name');
            $table->string('pet_species')->nullable();
            $table->string('pet_gender')->nullable();
            $table->string('pet_breed')->nullable();
            $table->string('pet_age')->nullable();
            $table->string('pet_weight')->nullable();
            $table->string('pet_height')->nullable();
            $table->string('pet_photo')->nullable();

            $table->dateTime('appointment_date')->nullable();
            $table->string('procedure_type')->nullable();
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kapons');
    }
};

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
        Schema::create('animals', function (Blueprint $table) {
            $table->id('animal_id');
            $table->string('name');
            $table->enum('species', ['Dog', 'Cat']);
            $table->enum('gender', ['Male', 'Female']);
            $table->string('breed')->nullable();
            $table->integer('age')->nullable();
            $table->decimal('height', 10, 2);
            $table->decimal('weight', 10, 2);
            $table->string('image');
            $table->enum('status', ['available', 'adopted'])->default('available');
            $table->text('description')->nullable();
            $table->foreignId('registered_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};

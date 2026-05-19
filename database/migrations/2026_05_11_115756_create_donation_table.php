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
        Schema::create('donation', function (Blueprint $table) {
            $table->id('donation_id');
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete()->cascadeOnUpdate();
            $table->string('donor_name');
            $table->string('donor_email');
            $table->string('donor_contact_number');
            $table->decimal('amount', 8, 2);
            $table->enum('payment_method', ['Credit Card', 'GCash', 'Bank Transfer']);
            $table->enum('status', ['Pending', 'Completed', 'Failed'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donation');
    }
};

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
        Schema::create('unit_marks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_registration_id');
            $table->decimal('marks', 5, 2); // Adjust the precision and scale as needed
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unit_marks');
    }
};

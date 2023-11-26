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
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('adminsio_no')->nullable();
            // $table->date('date_of_enrollment');
            // $table->date('date_of_birth');
            $table->enum('gender', ['Male', 'Female',]);
            $table->string('phone');
            $table->foreignId('role_id')->constrained();
            $table->string('address')->nullable();
            $table->string('teacher_qualifications')->nullable();
            // $table->foreignId('course_id')->nullable()->constrained();
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

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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->date('date_of_birth');
            $table->string('gender');
            $table->string('employee_id');
            $table->string('job_title');
            $table->string('subjects_taught');
            $table->string('department');
            $table->string('employment_status');
            $table->date('hire_date');
            $table->string('salary');
            $table->string('degrees');
            $table->string('institutions');
            $table->string('major');
            $table->integer('years_experience');
            $table->string('previous_schools');
            $table->string('training_courses');
            $table->string('certifications');
            $table->string('emergency_contact_name');
            $table->string('emergency_contact_relationship');
            $table->string('emergency_contact_phone');
            $table->string('photograph_path')->nullable();
            $table->string('unique_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};

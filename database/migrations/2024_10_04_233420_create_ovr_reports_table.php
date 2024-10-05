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
        Schema::create('ovr_reports', function (Blueprint $table) {
            $table->id();
            $table->string('ovr_number')->unique();
            $table->string('event_date');
            $table->string('event_time');
            $table->string('event_location');
            $table->string('reporting_department');
            $table->string('responding_department');
            $table->string('patient_name')->nullable();
            $table->string('medical_record')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable();
            $table->enum('patient_type', ['inpatient', 'outpatient', 'employee', 'visitor', 'other'])->nullable();
            $table->text('event_description');
            $table->string('reporter_name');
            $table->string('reporter_mobile');
            $table->string('reporter_position');
            $table->string('reporter_email');
            $table->string('event_category');
            $table->boolean('injury_occurred')->default(false);
            $table->enum('injury_type', ['physical', 'psychological'])->nullable();
            $table->text('admin_response')->nullable();
            $table->enum('status', ['pending', 'responded'])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ovr_reports');
    }
};

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
        Schema::create('job_details', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->string('job_title')->nullable();

            $table->date('appointment_date')->nullable();

            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

            $table->unsignedBigInteger('department_id');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');

            $table->unsignedBigInteger('branch_id');
            $table->foreign('barnch_id')->references('id')->on('branches')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_details');
    }
};

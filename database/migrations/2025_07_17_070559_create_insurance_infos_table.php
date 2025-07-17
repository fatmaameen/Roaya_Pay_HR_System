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
        Schema::create('insurance_infos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_code');
            $table->foreign('user_code')->references('id')->on('users')->onDelete('cascade');

            $table->string('insurance_number')->nullable();
            $table->date('start_date')->nullable();

            $table->unsignedBigInteger('job_id');
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');

            $table->unsignedBigInteger('insurance_id');
            $table->foreign('insurance_id')->references('id')->on('medical_incurances')->onDelete('cascade');


            $table->decimal('insurance_premium_value', 10, 2)->nullable();
            $table->date('end_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_infos');
    }
};

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
        Schema::create('medical_incurances', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('employees')->onDelete('cascade');

            $table->integer('documnet_number')->nullable();
            $table->date('start_date')->nullable();
            $table->string('insurance_company_name')->nullable();
            $table->string('insured_sim')->nullable();
            $table->decimal('insurance_premium_value')->nullable();
            $table->date('end_date')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medical_incurances');
    }
};

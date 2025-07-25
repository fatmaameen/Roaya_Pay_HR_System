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
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->string('address')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('governorate')->nullable();

            $table->string('personal_phone_number')->nullable();
            $table->string('company_phone_number')->nullable();

            $table->string('first_relative_phone_number')->nullable();
            $table->string('first_relative_relation')->nullable();
            $table->string('second_relative_phone_number')->nullable();
            $table->string('second_relative_relation')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_infos');
    }
};

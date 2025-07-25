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
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');

            $table->decimal('total_salary', 10, 2)->nullable();

            $table->decimal('main_salary', 10, 2)->nullable();

            $table->decimal('transfer_allowance', 10, 2)->nullable();
            $table->decimal('housing_allowance', 10, 2)->nullable();
            $table->decimal('meal_allowance', 10, 2)->nullable();
            
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salaries');
    }
};

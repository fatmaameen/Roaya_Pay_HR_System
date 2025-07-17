<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('leave_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_code');
            $table->foreign('user_code')->references('code')->on('users')->onDelete('cascade');

            $table->enum('type', ['e3tyade', '3arda']);
            $table->integer('days_number')->default(1);
            $table->date('date')->default(Carbon::now());

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_logs');
    }
};

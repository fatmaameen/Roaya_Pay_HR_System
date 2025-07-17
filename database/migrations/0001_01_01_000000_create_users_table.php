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
            $table->unsignedBigInteger('code')->unique();

            $table->string('first_name');
            $table->string('last_name');
            $table->enum('marital_status', ['single', 'married', 'divorced']);
            $table->string('religious');
            $table->string('national_number');
            $table->date('national_number_release_date');
            $table->date('national_number_expire_date');
            $table->string('national_number_governorate');
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->string('birth_place');
            $table->boolean('military_service');
            $table->integer('military_number')->nullable();
            $table->integer('photo')->nullable();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

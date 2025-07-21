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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('code')->unique();

            $table->string('first_name');
            $table->string('last_name');

            $table->enum('marital_status', ['أعزب', 'متزوج', 'مطلق']);
            $table->enum('religious', ['مسلم', 'مسيحي']);

            $table->string('national_id');
            $table->date('national_id_release_date');
            $table->date('national_id_expire_date');
            $table->string('national_id_issuing_dep');
            $table->string('national_id_governorate');
            $table->string('nationality');
            $table->date('date_of_birth');
            $table->string('birth_place');

            $table->enum('military_service', ['إعفاء موقت', 'إعفاء نهائي', 'كبير عائلة', 'إعفاء الابن الوحيد', 'أدي الخدمة', 'إعفاء طبي']);

            $table->integer('military_number')->nullable();
            $table->string('photo')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

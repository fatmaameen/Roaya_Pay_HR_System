<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('permits', function (Blueprint $table) {
    $table->id();
    $table->string('permit_number')->unique();
    $table->enum('type', ['موظف', 'زائر', 'مقاول']);
    $table->string('full_name');
    $table->string('id_number');
    $table->enum('gender', ['ذكر', 'أنثى']);
    $table->string('nationality');
    $table->string('organization');
    $table->string('purpose');
    $table->text('authorized_areas')->nullable();
    $table->dateTime('entry_time');
    $table->dateTime('exit_time');
    $table->text('notes')->nullable();
    $table->string('photo')->nullable();
    $table->string('documents')->nullable();
    $table->unsignedBigInteger('approver_id')->nullable();
    $table->enum('status', ['جديد', 'قيد الموافقة', 'مرفوض', 'مفعل', 'منتهي'])->default('جديد');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
    }
};
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('custom_id', 10)->unique();
            $table->string('emp_firstname');
            $table->string('emp_lastname');
            $table->bigInteger('emp_mobile');
            $table->string('emp_email')->unique();
            $table->date('emp_dob');
            $table->date('emp_joining');
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

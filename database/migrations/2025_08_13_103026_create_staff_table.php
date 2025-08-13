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
        Schema::create('staff', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Foreign key to schools table
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')
                  ->references('id')
                  ->on('schools')
                  ->onDelete('cascade');

            // Staff details
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('email', 255)->unique();
            $table->string('phone', 50)->nullable();
            $table->date('hire_date')->nullable();

            // Created & updated timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};


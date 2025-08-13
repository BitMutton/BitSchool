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
        Schema::create('subjects', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Foreign key to schools table
            $table->unsignedBigInteger('school_id');
            $table->foreign('school_id')
                  ->references('id')
                  ->on('schools')
                  ->onDelete('cascade');

            // Subject details
            $table->string('name', 100);
            $table->string('code', 50)->unique();
            $table->text('description')->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};


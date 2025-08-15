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
        Schema::table('timetable_entries', function (Blueprint $table) {
            $table->enum('day_of_week', [
                'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'
            ])->default('Monday')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('timetable_entries', function (Blueprint $table) {
            // Optional: revert back to string/varchar if needed
            $table->string('day_of_week', 10)->change();
        });
    }
};


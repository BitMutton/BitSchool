<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop the existing check constraint and add the new one
        DB::statement("
            ALTER TABLE `timetable_entries`
            DROP CHECK `chk_timetable_day`,
            ADD CONSTRAINT `chk_timetable_day` CHECK (day_of_week IN ('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert back to original abbreviated days
        DB::statement("
            ALTER TABLE `timetable_entries`
            DROP CHECK `chk_timetable_day`,
            ADD CONSTRAINT `chk_timetable_day` CHECK (day_of_week IN ('Mon','Tue','Wed','Thu','Fri','Sat','Sun'))
        ");
    }
};


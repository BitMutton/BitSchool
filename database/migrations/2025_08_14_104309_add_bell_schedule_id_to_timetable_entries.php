<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('timetable_entries', function (Blueprint $table) {
            if (!Schema::hasColumn('timetable_entries', 'bell_schedule_id')) {
                $table->foreignId('bell_schedule_id')
                    ->nullable()
                    ->constrained('bell_schedules')
                    ->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('timetable_entries', function (Blueprint $table) {
            if (Schema::hasColumn('timetable_entries', 'bell_schedule_id')) {
                $table->dropConstrainedForeignId('bell_schedule_id');
            }
        });
    }
};


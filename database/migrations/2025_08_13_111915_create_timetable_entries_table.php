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
        Schema::create('timetable_entries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('class_subject_id');
            $table->foreign('class_subject_id')
                ->references('id')
                ->on('class_subjects')
                ->onDelete('cascade');

            $table->string('day_of_week', 10);
            $table->time('start_time');
            $table->time('end_time');
        });

        // Add CHECK constraint for day_of_week
        DB::statement("
            ALTER TABLE timetable_entries 
            ADD CONSTRAINT chk_timetable_day 
            CHECK (day_of_week IN ('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'))
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timetable_entries');
    }
};


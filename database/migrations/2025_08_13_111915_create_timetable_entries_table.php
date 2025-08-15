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
        Schema::create('timetable_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_subject_id')->constrained()->onDelete('cascade');
            $table->enum('day_of_week', ['Mon','Tue','Wed','Thu','Fri','Sat','Sun']);
            $table->foreignId('bell_schedule_id')->nullable()->constrained('bell_schedules')->onDelete('set null');
            $table->integer('period')->nullable();
            $table->foreignId('room_id')->nullable()->constrained('rooms'); // optional: add 'rooms' table if exists
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
        Schema::dropIfExists('timetable_entries');
    }
};


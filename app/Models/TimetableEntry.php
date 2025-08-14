<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimetableEntry extends Model
{
    use HasFactory;

    protected $table = 'timetable_entries';

    protected $fillable = [
        'class_subject_id',
        'room_id',
        'bell_schedule_id',
        'period',
        'day',
    ];

    // Relationships
    public function bellSchedule()
    {
        return $this->belongsTo(BellSchedule::class);
    }

    public function classSubject()
    {
        return $this->belongsTo(ClassSubject::class, 'class_subject_id');
    }

    // Accessors
    public function schoolClass()
    {
        return $this->classSubject?->class;
    }

    public function subject()
    {
        return $this->classSubject?->subject;
    }

    public function teacher()
    {
        return $this->classSubject?->teacher;
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Carbon\Carbon;

class TimetableEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_subject_id',
        'day_of_week',
        'room_id',
        'bell_schedule_id',
        'period',
        'start_time',
        'end_time',
    ];

    protected $casts = [
        'day_of_week' => 'string',
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
    ];

    // Relationships
    public function classSubject(): BelongsTo
    {
        return $this->belongsTo(ClassSubject::class, 'class_subject_id');
    }

    // Access teacher through classSubject relationship
    public function teacher(): BelongsTo
    {
        return $this->classSubject()->getRelation('teacher');
        // Alternative: if ClassSubject has teacher() relationship:
        // return $this->classSubject->teacher();
    }

    public function classroom(): BelongsTo
    {
        return $this->classSubject()->getRelation('class');
    }

    public function subject(): BelongsTo
    {
        return $this->classSubject()->getRelation('subject');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function bellSchedule(): BelongsTo
    {
        return $this->belongsTo(BellSchedule::class, 'bell_schedule_id');
    }

    // Optional accessors
    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value);
    }
}


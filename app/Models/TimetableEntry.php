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
        'staff_id',          // Teacher assigned for this timetable slot
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

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'staff_id'); // teacher for this slot
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

    // Display helper for Filament forms / tables
    public function getClassSubjectDisplayAttribute(): string
    {
        $cs = $this->classSubject;
        return $cs
            ? ($cs->schoolClass?->name ?? 'Unknown Class')
              . ' - '
              . ($cs->subject?->name ?? 'Unknown Subject')
              . ' ('
              . ($this->staff?->full_name ?? 'Unknown Teacher') // Use staff assigned here
              . ')'
            : '';
    }


}


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
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    // ----------------------------
    // Relationships
    // ----------------------------
    public function classSubject(): BelongsTo
    {
        return $this->belongsTo(ClassSubject::class, 'class_subject_id');
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function bellSchedule(): BelongsTo
    {
        return $this->belongsTo(BellSchedule::class, 'bell_schedule_id');
    }

    // ----------------------------
    // Display helpers
    // ----------------------------
    public function getClassSubjectDisplayAttribute(): string
    {
        $cs = $this->classSubject;

        return $cs
            ? ($cs->schoolClass?->name ?? 'Unknown Class')
              . ' - '
              . ($cs->subject?->name ?? 'Unknown Subject')
              . ' ('
              . ($this->staff?->full_name ?? 'Unknown Teacher')
              . ')'
            : '';
    }

    // ----------------------------
    // Availability checks
    // ----------------------------
    public static function isTeacherAvailable(
        int $teacherId,
        string $day,
        string|Carbon $startTime,
        string|Carbon $endTime,
        int $excludeId = null
    ): bool {
        $query = self::where('staff_id', $teacherId)
            ->where('day_of_week', $day)
            ->where(function($q) use ($startTime, $endTime) {
                $q->whereBetween('start_time', [$startTime, $endTime])
                  ->orWhereBetween('end_time', [$startTime, $endTime])
                  ->orWhere(function($q2) use ($startTime, $endTime) {
                      $q2->where('start_time', '<=', $startTime)
                         ->where('end_time', '>=', $endTime);
                  });
            });

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return !$query->exists();
    }

    public static function isRoomAvailable(
        int $roomId,
        string $day,
        string|Carbon $startTime,
        string|Carbon $endTime,
        int $excludeId = null
    ): bool {
        $query = self::where('room_id', $roomId)
            ->where('day_of_week', $day)
            ->where(function($q) use ($startTime, $endTime) {
                $q->whereBetween('start_time', [$startTime, $endTime])
                  ->orWhereBetween('end_time', [$startTime, $endTime])
                  ->orWhere(function($q2) use ($startTime, $endTime) {
                      $q2->where('start_time', '<=', $startTime)
                         ->where('end_time', '>=', $endTime);
                  });
            });

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return !$query->exists();
    }
}


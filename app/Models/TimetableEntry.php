<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TimetableEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_subject_id',
        'staff_id',
        'day_of_week',
        'bell_schedule_id',
        'period',
        'room_id',
    ];

    // Optional: cast day_of_week as string
    protected $casts = [
        'day_of_week' => 'string',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function classSubject(): BelongsTo
    {
        return $this->belongsTo(ClassSubject::class);
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class);
    }

    public function bellSchedule(): BelongsTo
    {
        return $this->belongsTo(BellSchedule::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Accessors
    |--------------------------------------------------------------------------
    */

    public function getClassSubjectDisplayAttribute(): string
    {
        return ($this->classSubject?->schoolClass->name ?? 'Unknown Class') 
             . ' - ' 
             . ($this->classSubject?->subject->name ?? 'Unknown Subject');
    }

    /*
    |--------------------------------------------------------------------------
    | Model Event Hooks
    |--------------------------------------------------------------------------
    */

    protected static function booted(): void
    {
        static::saving(function (self $entry) {

            if ($entry->hasTeacherConflict()) {
                throw new \Exception("This teacher is not available for the selected period.");
            }

            if ($entry->hasRoomConflict()) {
                throw new \Exception("This room is already booked for the selected period.");
            }

            if ($entry->teacherExceededDailyLimit()) {
                throw new \Exception("This teacher already has 8 lectures on {$entry->day_of_week}.");
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Conflict Checks
    |--------------------------------------------------------------------------
    */

    protected function hasTeacherConflict(): bool
    {
        return self::where('staff_id', $this->staff_id)
            ->where('day_of_week', $this->day_of_week)
            ->where('bell_schedule_id', $this->bell_schedule_id)
            ->where('period', $this->period)
            ->where('id', '!=', $this->id)
            ->exists();
    }

    protected function hasRoomConflict(): bool
    {
        return self::where('room_id', $this->room_id)
            ->where('day_of_week', $this->day_of_week)
            ->where('bell_schedule_id', $this->bell_schedule_id)
            ->where('period', $this->period)
            ->where('id', '!=', $this->id)
            ->exists();
    }

    protected function teacherExceededDailyLimit(): bool
    {
        $count = self::where('staff_id', $this->staff_id)
            ->where('day_of_week', $this->day_of_week)
            ->where('id', '!=', $this->id)
            ->count();

        return $count >= 8;
    }
}


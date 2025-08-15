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
    ];

    protected $casts = [
        'day_of_week' => 'string',
    ];

    // Relationships
    public function classSubject(): BelongsTo
    {
        return $this->belongsTo(ClassSubject::class, 'class_subject_id');
    }

    public function teacher(): BelongsTo
    {
        // Access teacher through class_subject relationship
        return $this->classSubject()->with('teacher')->getRelation('teacher');
    }

    public function class(): BelongsTo
    {
        return $this->classSubject()->with('class')->getRelation('class');
    }

    public function subject(): BelongsTo
    {
        return $this->classSubject()->with('subject')->getRelation('subject');
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    public function bellSchedule(): BelongsTo
    {
        return $this->belongsTo(BellSchedule::class, 'bell_schedule_id');
    }

    // Accessors for Carbon
    public function getStartTimeAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function getEndTimeAttribute($value)
    {
        return Carbon::parse($value);
    }
}


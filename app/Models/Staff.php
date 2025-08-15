<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'role_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'hire_date',
    ];

    protected $casts = [
        'hire_date' => 'date',
    ];

    // Accessors
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // Relationships
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function role(): BelongsTo
    {
        return $this->belongsTo(StaffRole::class, 'role_id');
    }

    public function classes(): HasMany
    {
        return $this->hasMany(ClassModel::class, 'class_teacher_id');
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class, 'staff_id');
    }

    public function disciplinaryRecords(): HasMany
    {
        return $this->hasMany(DisciplinaryRecord::class, 'staff_id');
    }

    public function classSubjects(): HasMany
    {
        return $this->hasMany(ClassSubject::class, 'teacher_id');
    }

    public function timetableEntries(): HasManyThrough
    {
        return $this->hasManyThrough(
            TimetableEntry::class,
            ClassSubject::class,
            'teacher_id',        // Foreign key on class_subjects table
            'class_subject_id',  // Foreign key on timetable_entries table
            'id',                // Local key on staff table
            'id'                 // Local key on class_subjects table
        );
    }
}


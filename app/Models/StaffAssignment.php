<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffAssignment extends Model
{
    use HasFactory;

    protected $table = 'staff_assignments';

    protected $fillable = [
        'staff_id',
        'role_id',
        'grade_id',
        'subject_id',
        'academic_year_id',
        'assigned_at',
    ];

    protected $dates = ['assigned_at', 'created_at', 'updated_at'];

    /**
     * Relationships
     */

    // Assigned Staff
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    // Role (Teacher, Admin, etc.)
    public function role()
    {
        return $this->belongsTo(StaffRole::class, 'role_id');
    }

    // Grade / Class level
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    // Subject assigned
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    // Academic Year
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    // Timetable entries for this assignment
    public function timetableEntries()
    {
        return $this->hasMany(TimetableEntry::class, 'class_subject_id', 'subject_id')
            ->whereHas('classSubject', function($query) {
                $query->where('class_id', $this->grade_id);
            });
    }

    /**
     * Accessors
     */

    // Human-readable assignment description
    public function getAssignmentDescriptionAttribute()
    {
        $parts = [];

        if ($this->role) {
            $parts[] = $this->role->name;
        }

        if ($this->grade) {
            $parts[] = "Grade {$this->grade->name}";
        }

        if ($this->subject) {
            $parts[] = $this->subject->name;
        }

        return implode(' - ', $parts);
    }

    /**
     * Scopes
     */

    // Scope to filter by staff
    public function scopeForStaff($query, $staffId)
    {
        return $query->where('staff_id', $staffId);
    }

    // Scope to filter by academic year
    public function scopeForAcademicYear($query, $yearId)
    {
        return $query->where('academic_year_id', $yearId);
    }

    // Scope to filter by grade
    public function scopeForGrade($query, $gradeId)
    {
        return $query->where('grade_id', $gradeId);
    }

    // Scope to filter by subject
    public function scopeForSubject($query, $subjectId)
    {
        return $query->where('subject_id', $subjectId);
    }
}


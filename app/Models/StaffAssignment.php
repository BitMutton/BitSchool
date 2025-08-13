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

    protected $dates = ['assigned_at'];

    /**
     * Relationships
     */

    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    public function role()
    {
        return $this->belongsTo(StaffRole::class, 'role_id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    /**
     * Accessors
     */
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
}


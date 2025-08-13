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
    ];

    /**
     * Get the staff member assigned.
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }

    /**
     * Get the role of the staff assignment.
     */
    public function role()
    {
        return $this->belongsTo(StaffRole::class, 'role_id');
    }

    /**
     * Get the grade assigned (nullable).
     */
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    /**
     * Get the subject assigned (nullable).
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    /**
     * Get the academic year for this assignment.
     */
    public function academicYear()
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'name',
        'level_order',
    ];

    // Relationships

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'grade_id');
    }

    public function classes(): HasMany
    {
        return $this->hasMany(ClassModel::class, 'grade_id');
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class, 'grade_id');
    }

    public function feeStructures(): HasMany
    {
        return $this->hasMany(FeeStructure::class, 'grade_id');
    }

    public function staffAssignments(): HasMany
    {
        return $this->hasMany(StaffAssignment::class, 'grade_id');
    }
}


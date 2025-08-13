<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    use HasFactory;

    protected $table = 'exams';

    protected $fillable = [
        'academic_year_id',
        'grade_id',
        'subject_id',
        'name',
        'date',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // Relationships
    public function academicYear(): BelongsTo
    {
        return $this->belongsTo(AcademicYear::class, 'academic_year_id');
    }

    public function grade(): BelongsTo
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function results(): HasMany
    {
        return $this->hasMany(ExamResult::class, 'exam_id');
    }
}


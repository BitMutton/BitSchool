<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Subject extends Model
{
    use HasFactory;

    protected $table = 'subjects';

    protected $fillable = [
        'school_id',
        'name',
        'code',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    // Relationships
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(
            ClassModel::class,
            'class_subjects',
            'subject_id',
            'class_id'
        )->withPivot('teacher_id')->withTimestamps();
    }

    public function exams()
    {
        return $this->hasMany(Exam::class, 'subject_id');
    }
}


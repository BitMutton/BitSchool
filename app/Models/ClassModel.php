<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes';

    protected $fillable = [
        'school_id',
        'grade_id',
        'name',
        'teacher_id',
    ];

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Staff::class, 'teacher_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(
            Subject::class,
            'class_subjects',
            'class_id',
            'subject_id'
        )->withPivot('teacher_id')->withTimestamps();
    }

    public function timetableEntries()
    {
        return $this->hasMany(TimetableEntry::class, 'class_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}


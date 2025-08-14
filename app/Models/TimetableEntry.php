<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimetableEntry extends Model
{
    use HasFactory;

    protected $table = 'timetable_entries';

    protected $fillable = [
        'class_subject_id',
        'room',
        'period',
        'day',
    ];

    /**
     * Relationships
     */
    public function classSubject()
    {
        return $this->belongsTo(ClassSubject::class, 'class_subject_id');
    }

    public function getClassAttribute()
    {
        return $this->classSubject?->class;
    }

    public function getSubjectAttribute()
    {
        return $this->classSubject?->subject;
    }

    public function getTeacherAttribute()
    {
        return $this->classSubject?->teacher;
    }

    /**
     * Accessor for a readable label
     */
    public function getLabelAttribute()
    {
        if (!$this->classSubject) {
            return null;
        }

        $className = $this->class?->name ?? 'Unknown Class';
        $subjectName = $this->subject?->name ?? 'Unknown Subject';
        $teacherName = $this->teacher
            ? $this->teacher->first_name . ' ' . $this->teacher->last_name
            : 'Unknown Teacher';

        return "{$className} - {$subjectName} ({$teacherName})";
    }
}


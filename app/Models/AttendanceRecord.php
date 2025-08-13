<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttendanceRecord extends Model
{
    use HasFactory;

    protected $table = 'attendance_records';

    protected $fillable = [
        'student_id',
        'class_id',
        'date',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    // Relationships
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function class(): BelongsTo
    {
        return $this->belongsTo(ClassModel::class, 'class_id'); // ClassModel used because 'Class' is reserved
    }
}


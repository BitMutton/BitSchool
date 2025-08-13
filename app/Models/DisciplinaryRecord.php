<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DisciplinaryRecord extends Model
{
    use HasFactory;

    protected $table = 'disciplinary_records';

    protected $fillable = [
        'student_id',
        'staff_id',
        'incident_date',
        'description',
        'action_taken',
    ];

    public $timestamps = false;

    protected $dates = [
        'incident_date',
    ];

    // Relationships
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}


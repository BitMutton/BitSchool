<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}


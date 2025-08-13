<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'first_name',
        'last_name',
        'dob',
        'gender',
        'admission_date',
        'grade_id',
    ];

    protected $dates = ['dob', 'admission_date'];

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function guardians()
    {
        return $this->belongsToMany(
            Guardian::class,
            'guardian_relationships',
            'student_id',
            'guardian_id'
        )->withPivot('relationship_type');
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAgeAttribute()
    {
        return $this->dob ? $this->dob->age : null;
    }
}


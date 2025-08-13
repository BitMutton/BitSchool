<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
    ];

    public function students()
    {
        return $this->belongsToMany(
            Student::class,
            'guardian_relationships',
            'guardian_id',
            'student_id'
        )->withPivot('relationship_type');
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}


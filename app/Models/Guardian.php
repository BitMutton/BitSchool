<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    // Relationships
    public function students(): BelongsToMany
    {
        return $this->belongsToMany(
            Student::class,
            'guardian_relationships',
            'guardian_id',
            'student_id'
        )->withPivot('relationship_type');
    }

    // Accessors
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
    ];

    // Relationships

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class, 'school_id');
    }

    public function students(): HasMany
    {
        return $this->hasMany(Student::class, 'school_id');
    }

    public function staff(): HasMany
    {
        return $this->hasMany(Staff::class, 'school_id');
    }

    public function staffRoles(): HasMany
    {
        return $this->hasMany(StaffRole::class, 'school_id');
    }

    public function academicYears(): HasMany
    {
        return $this->hasMany(AcademicYear::class, 'school_id');
    }

    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'school_id');
    }

    public function announcements(): HasMany
    {
        return $this->hasMany(Announcement::class, 'school_id');
    }
}


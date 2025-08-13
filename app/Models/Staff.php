<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;

    protected $fillable = [
        'school_id',
        'role_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'hire_date',
    ];

    protected $dates = [
        'hire_date',
        'created_at',
        'updated_at',
    ];

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function role()
    {
        return $this->belongsTo(StaffRole::class, 'role_id');
    }

    public function classes()
    {
        return $this->hasMany(ClassModel::class, 'teacher_id');
    }

    public function announcements()
    {
        return $this->hasMany(Announcement::class, 'staff_id');
    }

    public function disciplinaryRecords()
    {
        return $this->hasMany(DisciplinaryRecord::class, 'staff_id');
    }

    // Accessors
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
}


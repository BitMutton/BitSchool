<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffRole extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'school_id',
        'name',
        'description',
    ];

    // Automatically manage timestamps
    public $timestamps = true;

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function staff()
    {
        return $this->hasMany(Staff::class);
    }
}


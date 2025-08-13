<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    use HasFactory;

    protected $table = 'announcements';

    protected $fillable = [
        'school_id',
        'staff_id',
        'title',
        'message',
        'posted_at',
    ];

    public $timestamps = false;

    protected $dates = [
        'posted_at',
    ];

    // Relationships
    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function staff(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
}


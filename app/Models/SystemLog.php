<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    use HasFactory;

    protected $table = 'system_logs';

    protected $fillable = [
        'user_id',
        'action',
        'timestamp',
    ];

    public $timestamps = false;

    protected $dates = [
        'timestamp',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


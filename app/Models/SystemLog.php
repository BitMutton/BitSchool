<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemLog extends Model
{
    use HasFactory;

    protected $table = 'system_logs';

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'user_id',
        'action',
        'timestamp',
    ];

    /**
     * Disable default timestamps
     */
    public $timestamps = false;

    /**
     * Cast timestamp column to Carbon instance
     */
    protected $dates = [
        'timestamp',
    ];

    /**
     * Relationship: the user who performed the action
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Optional: Scope to filter logs by action type
     */
    public function scopeAction($query, string $action)
    {
        return $query->where('action', $action);
    }
}


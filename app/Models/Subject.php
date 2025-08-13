<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Subject
 *
 * @property int $id
 * @property int $school_id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @property School $school
 */
class Subject extends Model
{
    protected $table = 'subjects';

    protected $fillable = [
        'school_id',
        'name',
        'code',
        'description',
    ];

    // Relationship
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class AcademicYear
 *
 * @property int $id
 * @property int $school_id
 * @property string $start_date
 * @property string $end_date
 * @property string $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 *
 * @property School $school
 * @property \Illuminate\Database\Eloquent\Collection|ClassModel[] $classes
 * @property \Illuminate\Database\Eloquent\Collection|Exam[] $exams
 * @property \Illuminate\Database\Eloquent\Collection|FeeStructure[] $feeStructures
 * @property \Illuminate\Database\Eloquent\Collection|StaffAssignment[] $staffAssignments
 * @property Staff|null $creator
 * @property Staff|null $updater
 */
class AcademicYear extends Model
{
    use SoftDeletes;

    protected $table = 'academic_years';

    protected $fillable = [
        'school_id',
        'start_date',
        'end_date',
        'status',
        'created_by',
        'updated_by',
    ];

    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // Status constants
    const STATUS_ACTIVE = 'active';
    const STATUS_ARCHIVED = 'archived';
    const STATUS_UPCOMING = 'upcoming';

    // Relationships
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class);
    }

    public function classes(): HasMany
    {
        return $this->hasMany(ClassModel::class, 'academic_year_id');
    }

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class, 'academic_year_id');
    }

    public function feeStructures(): HasMany
    {
        return $this->hasMany(FeeStructure::class, 'academic_year_id');
    }

    public function staffAssignments(): HasMany
    {
        return $this->hasMany(StaffAssignment::class, 'academic_year_id');
    }

    // Creator/updater relations
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'created_by');
    }

    public function updater(): BelongsTo
    {
        return $this->belongsTo(Staff::class, 'updated_by');
    }

    // Scopes
    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ACTIVE);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_UPCOMING);
    }

    public function scopeArchived(Builder $query): Builder
    {
        return $query->where('status', self::STATUS_ARCHIVED);
    }

    // Helper methods
    public function isActive(): bool
    {
        return $this->status === self::STATUS_ACTIVE;
    }

    public function isUpcoming(): bool
    {
        return $this->status === self::STATUS_UPCOMING;
    }

    public function isArchived(): bool
    {
        return $this->status === self::STATUS_ARCHIVED;
    }
}


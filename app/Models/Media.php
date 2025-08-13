<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $table = 'media';

    /**
     * Mass assignable fields
     */
    protected $fillable = [
        'model_type',
        'model_id',
        'uuid',
        'collection_name',
        'name',
        'file_name',
        'mime_type',
        'disk',
        'conversions_disk',
        'size',
        'manipulations',
        'custom_properties',
        'generated_conversions',
        'responsive_images',
        'order_column',
    ];

    /**
     * Cast JSON columns to arrays
     */
    protected $casts = [
        'manipulations' => 'array',
        'custom_properties' => 'array',
        'generated_conversions' => 'array',
        'responsive_images' => 'array',
        'size' => 'integer',
        'order_column' => 'integer',
    ];

    /**
     * Polymorphic relationship to any model
     */
    public function model()
    {
        return $this->morphTo();
    }

    /**
     * Scope query by collection name
     */
    public function scopeCollection($query, string $collectionName)
    {
        return $query->where('collection_name', $collectionName);
    }

    /**
     * Optional: Accessor for full file path
     */
    public function getFullPathAttribute(): string
    {
        return $this->disk && $this->file_name ? "{$this->disk}/{$this->file_name}" : '';
    }
}


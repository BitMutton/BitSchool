<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Many-to-Many relationship with permissions via role_permissions
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions', 'role_id', 'permission_id');
    }

    /**
     * Relationship to RolePermission pivot table
     */
    public function rolePermissions()
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }
}


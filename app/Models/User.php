<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser as FilamentUserContract;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUserContract
{
    use HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'email',
        'password_hash',
        'person_type',
        'person_id',
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    // Map 'name' attribute for Filament display
    public function getNameAttribute(): string
    {
        return $this->username;
    }

    // Map 'password' attribute
    public function getPasswordAttribute(): string
    {
        return $this->password_hash;
    }

    public function setPasswordAttribute($value): void
    {
        $this->attributes['password_hash'] = bcrypt($value);
    }

    // Required by Filament v4
    public function canAccessPanel(Panel $panel): bool
    {
        // Only staff can access Filament
        return $this->person_type === 'staff';
    }
}


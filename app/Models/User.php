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
         'password',  
    ];

    protected $hidden = [
        'password_hash',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Accessors
    public function getNameAttribute(): string
    {
        return $this->username;
    }

    public function getPasswordAttribute(): string
    {
        return $this->password_hash;
    }

    // Mutators
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password_hash'] = bcrypt($value);
    }

    // Filament access control
   public function canAccessPanel(Panel $panel): bool
{
    // return $this->person_type === 'staff';
    return true;  // allow access temporarily
}


    // Polymorphic relation to staff or student
    public function person()
    {
        return $this->morphTo();
    }
}


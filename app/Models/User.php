<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'role',
        'password',
        'profile',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function notes(): HasMany
    {
        return $this->hasMany(Note::class);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return true;
    }

    public function getFilamentName(): string
    {
        return $this->name;
    }
}

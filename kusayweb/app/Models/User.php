<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;

class User extends Authenticatable implements FilamentUser
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    protected $fillable = [
        'name','email','password','phone','role_hint','is_active','last_login_at',
    ];

    protected $hidden = ['password','remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at'     => 'datetime',
        'is_active'         => 'boolean',
    ];

    // Acceso a Filament: solo Admin y activo
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->hasRole('Admin') && ($this->is_active ?? true);
    }

    // Relación
    public function leadsAssigned()
    {
        return $this->hasMany(Lead::class, 'assigned_to');
    }

    // Hash automático si envían texto plano
    public function setPasswordAttribute($value): void
    {
        if (!empty($value) && password_get_info($value)['algo'] === 0) {
            $this->attributes['password'] = bcrypt($value);
        } else {
            $this->attributes['password'] = $value;
        }
    }
}

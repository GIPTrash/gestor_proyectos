<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que se asignan masivamente.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
    ];

    /**
     * Los atributos que se ocultan para la serialización.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts para los atributos.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Accessor para obtener el nombre completo.
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Mutator para formatear el primer nombre.
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value))
        );
    }

    /**
     * Mutator para formatear el apellido.
     */
    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value))
        );
    }

    /**
     * Relación: un usuario tiene muchos proyectos.
     */
    public function projects()
    {
        return $this->hasMany(\App\Models\Project::class);
    }

    /**
     * Scope para filtrar usuarios activos (por ejemplo, verificados).
     */
    public function scopeActive($query)
    {
        return $query->whereNotNull('email_verified_at');
    }
}

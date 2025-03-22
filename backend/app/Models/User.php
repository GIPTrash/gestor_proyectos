<?php

namespace App\Models;

use App\Enums\Role;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens;

    /**
     * Los atributos que se asignan masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role', // Se agregó el rol
    ];

    /**
     * Los atributos que se ocultan para la serialización.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casts para los atributos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'role'              => Role::class, // Casting al enum Role
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
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function firstName(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value))
        );
    }

    /**
     * Mutator para formatear el apellido.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function lastName(): Attribute
    {
        return Attribute::make(
            set: fn($value) => ucfirst(strtolower($value))
        );
    }

    /**
     * Mutator para hashear la contraseña automáticamente.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn($value) => bcrypt($value)
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

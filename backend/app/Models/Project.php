<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    // Si el nombre de la tabla es distinto del plural del modelo, se especifica
    protected $table = 'projects';

    // Atributos asignables
    protected $fillable = ['name', 'user_id'];

    /**
     * Relación 1 a N: un proyecto pertenece a un usuario (creador).
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    /**
     * Relación N a N: colaboradores del proyecto.
     */
    public function collaborators()
    {
        return $this->belongsToMany(\App\Models\User::class, 'project_user', 'project_id', 'user_id')
                    ->withTimestamps();
    }
}

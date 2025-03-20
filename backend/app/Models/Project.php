<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    // Si el nombre de la tabla es distinto del plural del modelo, se especifica
    protected $table = 'project';

    // Atributos asignables
    protected $fillable = ['name', 'user_id'];

    /**
     * Relación: un proyecto pertenece a un usuario.
     */
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}

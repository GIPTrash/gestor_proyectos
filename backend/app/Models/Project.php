<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    // Si el nombre de la tabla es distinto del plural del modelo, lo especificamos
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

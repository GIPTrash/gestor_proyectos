<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        // Ajustá la autorización según la lógica de tu aplicación
        return true;
    }

    public function rules()
    {
        return [
            'name'    => 'sometimes|string|min:3|max:255',
            'user_id' => 'sometimes|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'name.string'      => 'El nombre debe ser una cadena de texto.',
            'name.min'         => 'El nombre debe tener al menos 3 caracteres.',
            'name.max'         => 'El nombre no puede exceder los 255 caracteres.',
            'user_id.integer'  => 'El ID de usuario debe ser un número entero.',
            'user_id.exists'   => 'El usuario especificado no existe.',
        ];
    }
}

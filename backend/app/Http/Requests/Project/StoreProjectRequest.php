<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
{
    public function authorize()
    {
        // Ajustá la autorización según la lógica de tu aplicación
        return true;
    }

    public function rules()
    {
        return [
            'name'    => 'required|string|min:3|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required'    => 'El nombre del proyecto es obligatorio.',
            'name.min'         => 'El nombre del proyecto debe tener al menos 3 caracteres.',
            'name.max'         => 'El nombre del proyecto no puede exceder los 255 caracteres.',
            'user_id.required' => 'El ID de usuario es obligatorio.',
            'user_id.integer'  => 'El ID de usuario debe ser un número entero.',
            'user_id.exists'   => 'El usuario especificado no existe.',
        ];
    }
}

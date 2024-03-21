<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        // Autorizamos la solicitud (ajustá según la lógica de tu aplicación)
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'sometimes|string|max:255',
            'last_name'  => 'sometimes|string|max:255',
            'email'      => 'sometimes|email|unique:users,email,' . $this->route('id'),
            'password'   => 'sometimes|min:6',
        ];
    }

    public function messages()
    {
        return [
            'first_name.string' => 'El nombre debe ser una cadena de texto.',
            'first_name.max'    => 'El nombre no puede exceder los 255 caracteres.',
            'last_name.string'  => 'El apellido debe ser una cadena de texto.',
            'last_name.max'     => 'El apellido no puede exceder los 255 caracteres.',
            'email.email'       => 'El email debe tener un formato válido.',
            'email.unique'      => 'El email ya se encuentra registrado.',
            'password.min'      => 'La contraseña debe tener al menos 6 caracteres.',
        ];
    }
}

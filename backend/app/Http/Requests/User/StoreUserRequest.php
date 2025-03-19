<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        // Autorizamos la solicitud
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required'  => 'El nombre es obligatorio.',
            'last_name.required'   => 'El apellido es obligatorio.',
            'email.required'       => 'El email es obligatorio.',
            'email.email'          => 'El email debe tener un formato válido.',
            'email.unique'         => 'El email ya se encuentra registrado.',
            'password.required'    => 'La contraseña es obligatoria.',
            'password.min'         => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed'   => 'La confirmación de la contraseña no coincide.',
        ];
    }
}

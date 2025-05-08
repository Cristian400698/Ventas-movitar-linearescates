<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:10|max:50',
            'username' => 'required|unique:users',
            'cedula' =>'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'El nombre es requerido',
            'username.required' => 'El nombre de usuario es requerido',
            'cedula.required' =>'El numero de cedula es requerido',
            'email.required' => 'El correo electronico es requerido',
            'password.required' => 'La contraseña es requerida',
        ];
    }
}

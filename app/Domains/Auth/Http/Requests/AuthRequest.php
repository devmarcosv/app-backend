<?php

namespace App\Domains\Auth\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function prepareForValidation()
    {
        //
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'email|required|exists:users,email',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [];
    }

    public function attributes()
    {
        return[
            'email' => 'Email de Usuário',
            'password' => 'Senha'
        ];
    }
}
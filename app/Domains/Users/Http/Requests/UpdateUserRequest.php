<?php

namespace App\Domains\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    //
    public function __construct()
    {
        // ##
    }

    public function authorize(): bool   
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable',
            'email' => 'nullable|email',
            'password' => 'required|max:8',
            'date_of_birth' => 'nullable',
            'gender' => 'nullable'
        ];
    }

    public function messages(): array
    {
        return [
            
        ];
    }

    public function attributes()
    {
        return [
          'name' => 'Nome',
          'email' => 'Email de Usuário.',
          'password' => 'Senha'
        ];
    }

}







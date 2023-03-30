<?php

namespace App\Domains\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'date_of_birth' => 'required|date_format:Y-m-d',
            'gender' => 'required',
            'password' => 'required|min:8'
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
          'date_of_birth' => 'Data de nascimento',
          'gender' => 'Gênero (sexo, orientação sexual)',
          'password' => 'Senha'
        ];
    }

}







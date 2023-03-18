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
            'email' => 'required|email',
            'date_of_birth' => 'requied|date_format:d-m-Y',
            'gender' => 'required',
            'password' => 'required|max:8'
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







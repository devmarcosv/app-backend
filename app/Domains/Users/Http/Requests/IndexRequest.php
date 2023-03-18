<?php

namespace App\Domains\Users\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
          'name' => 'Nome'
        ];
    }

}







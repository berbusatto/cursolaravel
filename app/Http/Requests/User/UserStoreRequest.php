<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{

    public function authorize()
    {
        // Auth::check();
        return true;
    }


    public function rules()
    {

        return [
            'name' => 'string|required',
            'email' => 'email|required',
            'password' => 'string|required',
            'term' => 'accepted'
        ];
    }

    public function messages(){
        return [
            'name.string' => 'O nome precisa ser uma string',
            'password.string' => 'A senha precisa ser uma string',
            'required' => 'Este campo é obrigatório',
            'email' => 'Este campo deve ser um e-mail',
            'term' => 'Voce deve aceitar os termos de uso'
        ];
    }
}

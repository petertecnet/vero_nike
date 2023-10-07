<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name'  => 'required|string',
            'password'  => 'required',
            'email'  => 'required|unique:users|',
            'login'  => 'required|unique:users',
			'companies' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo NOME não pode ser vázio',
            'name.string' => 'O campo NOME deve ser do tipo texto',


            'password.required' => 'O campo SENHA não pode ser vázio',


            'email.required' => 'O campo EMAIL não pode ser vázio',
            'email.string' => 'O campo EMAIL deve ser do tipo texto',
            'email.unique' => 'O EMAIL informado já esta em uso',
            'email.email' => 'Digite um EMAIL válido',


            'login.unique' => 'O LOGIN informado já esta em uso',
        ];
    }
}

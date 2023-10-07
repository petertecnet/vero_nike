<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
            'CNPJ'  => 'required|string|cnpj|unique:companies',
            'status'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo NOME não pode ser vázio',
            'name.string' => 'O campo NOME deve ser do tipo texto',


            'status.required' => 'O campo status de STATUS não pode ser vázio',


            'CNPJ.required' => 'O campo CNPJ não pode ser vázio',
            'CNPJ.cnpj' => 'Este CNPJ informado é inválido',
            'CNPJ.unique' => 'Este CNPJ informado já esta em uso',
        ];
    }
}

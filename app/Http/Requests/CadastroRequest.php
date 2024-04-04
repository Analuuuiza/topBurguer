<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CadastroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5',
            'telefone' => 'required|max:11|min:11',
            'endereco' => 'required|max:80|min:5',
            'email' => 'required|max:120|min:5',
            'password' => 'required|min:5',

        ];
    }

    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
{
    return [
        'nome.required' => 'O nome é obrigatório',
        'nome.max' => 'O nome deve conter no máximo 80 caracteres',
        'nome.min' => 'O nome deve conter no mínimo 5 caracteres',
        'telefone.required' => 'O telefone é obrigatório',
        'telefone.max' => 'O telefone deve conter no máximo 11 caracteres',
        'telefone.min' => 'O telefone deve conter no mínimo 11 caracteres',
        'endereco.required' => 'o endereço é obrigaório',
        'endereco.max' => 'O endereço deve conter no máximo 80 caracteres',
        'endereco.min' => 'O endereço deve conter no mínimo 5 caracteres',
        'email.required' => 'O email é obrigatório',
        'email.max' => 'O email deve conter no máximo 120 caracteres',
        'email.min' => 'O email deve conter no mínimo 5 caracteres',
        'password.required' => 'A senha é obrigatória',
        'password.min' => 'A senha deve conter no mínimo 5 caracteres',
    ];
}
}

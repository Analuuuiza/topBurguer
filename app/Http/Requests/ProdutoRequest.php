<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProdutoRequest extends FormRequest
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
            'preco' => 'required|decimal:2',
            'ingredientes' => 'required|max:100|min:5'
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

        'preco.required' => 'O preço é obrigatório',
        'preco.decimal' => 'O campo preço deve ser numérico com 2 casas decimais.',
        
        'ingredientes.required' => 'Os ingredientes são obrigatórios',
        'ingredientes.max' => 'Os ingredientes devem conter no máximo 100 caracteres',
        'ingredientes.min' => 'Os ingredientes devem conter no mínimo 5 caracteres'
    ];
}
}
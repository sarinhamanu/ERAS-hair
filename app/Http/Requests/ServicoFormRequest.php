<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServicoFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'nome' => 'required|max:80|min:5',
            'descricao' => 'required|max:200|min:10',
            'duracao' => 'required|numeric',
            'preco' => 'required|decimal:2'

        ];
    }
    public function failedvalidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'error' => $validator->errors()
        ]));
    }

    public function messages()
    {
        return [
            'nome.required' => 'o campo nome e obrigatório',
            'nome.max' => 'o campo nome deve conter no maximo 80 caracteres',
            'nome.min' => 'o campo nome deve conter no minino 5 caracteres',
            'nome.unique' => 'nome ja esta cadastrado no sistema',
            'descricao.required' => 'o campo descricao e obrigatório',
            'descricao.max' => ' o campo descricao deve conter no maximo 200 caracteres',
            'descricao.min' =>  'o campo descricao deve conter no minimo 10 caracteres',
            'duracao.required' => 'o campo duracao e obrigatório',
            'duracao.numeric' => 'formato inválido so aceito number',
            'preco.price.decimal' => 'formato invalido ',
            'preco.required' => 'o campo preco e obrigatório'


        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProfissionalRequest extends FormRequest
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
    
                'nome' => 'required|max:120|min:5|',
                'celular' => 'required|max:11|min:10|',
                'email' => 'required|max:120|email|unique:clientes,email',
                'cpf' => 'required|max:11|min:11|unique:clientes,cpf',
                'dataNascimento' => 'required|',
                'cidade' => 'required|max:120|',
                'estado' => 'required|max:2|min:2|',
                'pais' => 'required|max:80|',
                'rua' => 'required|max:120|',
                'numero' => 'required|max:10|',
                'bairro' => 'required|max:100|',
                'cep' => 'required|max:8|min:8|',
                'complemento' => '|max:150|',
                'senha' => 'required|',
                'salario' => 'required',
    
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
                return[
                    'nome.required' =>'o campo nome é obrigatorio',
                    'nome.max' => 'o campo nome deve conter no maximo 120 caracteres',
                    'nome.min' => 'o campo nome deve conter no minimo 5 caracteres',
                    'celular.required' => 'celular obrigatorio',
                    'celular.max' => 'o celular  deve conter no maximo 11 caracteres',
                    'celular.min' => 'o celular deve conter no minimo 10 caracteres',
                    'email.required' => 'email obrigatorio',
                    'email.unique' => 'email ja cadastrado no sistema',
                    'email.email' => 'formato invalido',
                    'email.max' => 'o email deve conter no maximo 120 caracteres',
                    'cpf.required' =>'o campo cpf é obrigatorio',
                    'cpf.max' => 'o campo cpf deve conter no maximo 11 caracteres',
                    'cpf.min' => 'o campo cpf deve conter no minimo 11 caracteres',
                    'cpf.unique' => 'cpf ja cadastrado no sistema',
                    'dataNascimento.required' =>'o campo dataNascimento é obrigatorio',
                    'dataNascimento.date' => 'formato invalido',
                    'cidade.required' =>'o campo cidade é obrigatorio',
                    'cidade.max' => 'o campo cidade deve conter no maximo 120 caracteres',
                    'estado.required' =>'o campo estado é obrigatorio',
                    'estado.max' => 'o campo estado deve conter no maximo 2 caracteres',
                    'estado.min' => 'o campo estado deve conter no minimo 2 caracteres',
                    'pais.required' =>'o campo pais é obrigatorio',
                    'pais.max' => 'o campo pais sdeve conter no maximo 80 caracteres',
                    'rua.required' =>'o campo rua é obrigatorio',
                    'rua.max' => 'o campo rua deve conter no maximo 120 caracteres',
                    'numero.required' =>'o campo numero é obrigatorio',
                    'numero.max' => 'o campo numero deve conter no maximo 10 caracteres',
                    'bairro.required' =>'o campo bairro é obrigatorio',
                    'bairro.max' => 'o campo bairro deve conter no maximo 100 caracteres',
                    'cep.required' =>'o campo cep é obrigatorio',
                    'cep.max' => 'o campo cep deve conter no maximo 8 caracteres',
                    'cep.min' => 'o campo cep deve conter no minimo 8 caracteres',
                    'complemento.max' => 'o campo complemento deve conter no maximo 150 caracteres',
                    'senha.required' =>'o campo senha é obrigatorio',
                    'salario.required' => 'o campo salario é obrigatorio',
                
                    
                ];
                    
    }
}


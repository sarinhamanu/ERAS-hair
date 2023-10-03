<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class clienteFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nome'=>'required|max:120|min:5',
            'celular'=>'required|max:11|min:10',
            'email'=>'required|max:120|unique:clientes,email',
            'cpf'=>'required|max:11|min:11|unique:clientes,cpf',
            'dataNascimento'=>'required|date',
            'cidade'=>'required|max:120',
            'estado'=>'required|max:2|min:2',
            'pais'=>'required|max:80',
            'rua'=>'required|max:120',
            'numero'=>'required|max:10',
            'bairro'=>'required|max:100 ',
            'cep'=>'required|max:8|min:8',
            'complemento'=>'max:150',
            'senha'=>'required',

        ];
    }
    public function failedvalidation(Validator $validator){
    throw new HttpResponseException(response()->json([
        'success'=> false,
        'error'=> $validator->errors()
    ]));
    }
    public function messages()
    {
        
   
        return [ 
            'nome.required'=> 'o campo nome e obrigatório ',
            'nome.max'=> 'o campo nome deve conter no maximo 120 caracteres',
            'nome.min'=> 'o campo nome deve conter no minino 5 caracteres',
            'celular.required'=> 'o campo celular e obrigatório',
            'celular.max'=> 'o campo celular deve conter no maximo 11 caracteres',
            'celular.min'=> 'o campo celular deve conter no minimo 10 caracteres',
            'email.required'=> 'o campo email e obrigatório',
            'email.max'=>'o campo email deve conter no maximo 120 caracteres',
            'email.unique'=>'emai ja esta cadastrado no sistema',
            'cpf.required'=> 'o campo cpf e obrigatório',
            'cpf.max'=> 'o campo cpf deve conter no maximo 11 caracteres',
            'cpf.min'=> 'o campo cpf deve conter no minimo 11 caracteres',
            'cpf.unique'=> 'cpf ja esta cadastrado no sistema',
            'dataNascimento.required'=> 'o campo  dataNascimento e obrigatório',
            'dataNascimento.date'=>'formato invalido',
            'cidade.required'=> 'o campo cidade e obrigatório',
            'cidade.max'=>'o campo cidade  deve conter no maximo 120 caracteres',
            'estado.required'=> 'o campo estado e obrigatório',
            'estado.max'=>'o campo estado deve conter no maximo 2 caracteres',
            'estado.min'=> 'o campo estado deve conter no minimo 2 caracteres',
            'pais.required'=>'o campo pais e obrigatório',
            'pais.max'=>'o campo pais deve conter no maximo 80 caracteres',
            'rua.required'=> 'o campo rua e obrigatório',
            'rua.max'=> 'o campo rua deve conter no maximo 120 caracteres',
            'numero.required'=> 'o campo numero e obrigatório',
            'numero.max'=> 'o campo numero deve conter no maximo  10 caracteres',
            'bairro.required'=> ' o campo bairro e obrigatório',
            'bairro.max'=> 'o campo bairro deve conter no maximo 100 caracteres',
            'cep.required'=> 'o campo cep e obrigatório',
            'cep.max'=>'o campo cep deve conter no maximo 8 caracteres',
            'cep.min'=> 'o campo cep deve conter no minimo  8 caracteres',
            'complemento.max'=>'o campo complemento deve conter no maximo 150 caracteres',
            'senha.required'=>'senha obrigatória',

        
        ];
    }
}

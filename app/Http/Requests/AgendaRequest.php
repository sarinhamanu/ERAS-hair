<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AgendaRequest extends FormRequest
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
        return  [
                'profissional_id' => 'required',
                'cliente_id' => 'required',
                'servico_id'=> 'required',
                'data_hora'=>'required|date',
                'tipo_pagamento'=>'required|max:20|min:3',
                'valor'=>'required|decimal'
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
  'profissional_id.required'=>'o campo profissional e obrigatorio',
  'cliente_id.required'=>'o campo cliente e obrigatorio',
  'servico_id.required'=>'o campo servico e obrigatorio',
  'data_hora.required'=>'o campo data hora e obrigatorio',
  'data_hora.date'=>'campo invalido',
  'tipo_pagamento.required'=>'o campo pagamento e obrigatorio',
  'tipo_pagamento.max'=>'o campo pagamento deve conter no maximo 20 caracteres',
  'tipo_pagamento.min'=>'o campo pagamento deve conter no minimo 3 caracteres'
    ];
}
}
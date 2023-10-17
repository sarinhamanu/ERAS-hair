<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfissionalFormRequest;
use App\Http\Requests\ProfissionalRequest;
use App\Models\Profissional;
use App\Models\ProfissionalModel;
use Illuminate\Http\Request;

class ProfissionalController extends Controller
{
    public function store(ProfissionalRequest $request)
    {
      $profissional = ProfissionalModel::create([
  
        'nome' => $request->nome,
        'celular' => $request->celular,
        'cpf' => $request->cpf,
        'email' => $request->email,
        'dataNascimento' => $request->dataNascimento,
        'cidade' => $request->cidade,
        'estado' => $request->estado,
        'pais' => $request->pais,
        'rua' => $request->rua,
        'numero' => $request->numero,
        'bairro' => $request->bairro,
        'cep' => $request->cep,
        'complemento' => $request->complemento,
        'senha' => $request->senha,
        'salario' => $request->salario,

      ]);
      return response()->json([
        "success" => true,
        "message" => "profissional Cadastrado com sucesso",
        "data" => $profissional
      ], 200);
    }
    public function pesquisarPorNome3(Request $request)
        {
          $profissional = ProfissionalModel::where('nome', 'like', '%' . $request->pesquisarPorNome3 . '%')->get();
      
          if (count($profissional) > 0) {
            return response()->json([
              'status' => true,
              'data' => $profissional
            ]);
          }
      
          return response()->json([
            'status' => false,
            'message' => 'nao ha resultados para pesquisa'
          ]);
        }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgendaRequest;
use App\Models\AgendaModel;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    public function store(AgendaRequest $request)
    {
      $agenda = AgendaModel::create([
        'profissional_id'=> $request->profissional_id,
        'cliente_id'=> $request->cliente_id,
        'servico_id'=> $request->servico_id,
        'data_hora'=> $request->data_hora,
        'tipo_pagamento'=> $request->tipo_pagamento,
        'valor'=> $request->valor,
    
      ]);
      return  response()->json([
        "success"=> true,
        "message"=>"agenda cadastrado com sucesso",
        "data"=> $agenda
      ],200);
}
}
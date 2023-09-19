<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServicoFormRequest;
use App\Models\servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
  public function store (ServicoFormRequest $request){
$servico = servico::create([
 'nome'=>$request->nome,
 'descricao'=>$request->descricao,
 'duracao'=> $request->duracao,
 'preco'=> $request->preco,
]);
return response()->json([
    "success" => true,
    "message" => "servico cadastrado com sucesso",
    "data"    =>$servico
],200);
}

public function pesquisarPorNome(Request $request){
$servico =  servico::where('nome', 'like', '%'. $request->nome . '%')->get();



  if(count($servico ) > 0){
return response()->json([
    'status'=> true,
    'data' => $servico
]);

}


return response()->json([
    'status'=> false,
    'message' =>"servico não encontrado"
 ]);
}


public function pesquisarPorDescricao(Request $request){
    $servico =  servico::where('descricao', 'like', '%'. $request->descricao . '%')->get();
    
    
    
      if(count($servico ) > 0){
    return response()->json([
        'status'=> true,
        'data' => $servico
    ]);
    
    }
    
    
    return response()->json([
        'status'=> false,
        'message' =>"servico não encontrado"
     ]);

    }
    public function update(Request $request){
    $servico = servico::find($request->id);

    if(!isset($servico)){
        return response()->json([
            'status' => 'servico não encontrado'
        ]);
    }
if(isset($request->nome)){
    $servico->nome =$request->nome;
}

if(isset($request->descricao)){
    $servico->descricao =$request->descricao;
}
if(isset($request->duracao)){
    $servico->duracao =$request->duracao;

}
if(isset($request->preco)){
    $servico->preco =$request->preco;

    

$servico->update();

return response()->json([
'status' =>true,
'message'=> 'servico atualizando'
]);
}

}

public function excluir($id){
    $servico = servico::find($id);
   
    if(!isset($servico)){
       return response()->json([
      'status' => false,'message' => "servico não encontrado"
       ]);
    }
   
    $servico->delete();
   
    return response()->json([
   'status' => true, 'message'=> "servico excluído com sucesso"
    ]);
   
   
   
   
   
   }
}



















<?php

namespace App\Http\Controllers;

use App\Http\Requests\clienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
  public function store1(clienteFormRequest $request){
    $cliente = Cliente::create([
     'nome'=>$request->nome,                                                      
     'email'=>$request-> email ,
     'cpf'=> $request->cpf,
     'dataNascimento'=> $request->dataNascimento,
     'cidade'=> $request->cidade,
     'estado'=> $request->estado,
     'pais'=> $request->pais,
     'rua'=> $request->rua,
     'numero'=> $request->numero,
     'bairro'=> $request->bairro,
     'cep'=> $request->cep,
     'complemento'=> $request->complemento,
     'senha'=> $request->senha,
    ]);
    return response()->json([
        "success" => true,
        "message" => "servico cadastrado com sucesso",
        "data"    =>$cliente
    ],200);
    }
    
    public function pesquisarPorNomeDoCliente(Request $request){
    $cliente =  Cliente::where('nomeDoCliente', 'like', '%'. $request->pesquisarPorNomeDoCliente . '%')->get();
    
    
    
      if(count($cliente ) > 0){
    return response()->json([
        'status'=> true,
        'data' => $cliente
    ]);
    
    }
    
    
    return response()->json([
        'status'=> false,
        'message' =>"servico não encontrado"
     ]);
    }
    
    
    public function pesquisarPorCPFCliente(Request $request){
        $cliente =  Cliente::where('cpf', 'like', '%'. $request->cpf . '%')->get();
        
        
        
          if(count($cliente ) > 0){
        return response()->json([
            'status'=> true,
            'data' => $cliente
        ]);
        
        }
        
        
        return response()->json([
            'status'=> false,
            'message' =>"servico não encontrado"
         ]);
    
        }

        public function pesquisarPorCelularCliente(Request $request){
            $cliente =  Cliente::where('celular', 'like', '%'. $request->celular . '%')->get();
            
            
            
              if(count($cliente ) > 0){
            return response()->json([
                'status'=> true,
                'data' => $cliente
            ]);
            
            }
            
            
            return response()->json([
                'status'=> false,
                'message' =>"servico não encontrado"
             ]);
        
            }

            public function pesquisarPorEmailCliente(Request $request){
                $cliente =  Cliente::where('email', 'like', '%'. $request->email . '%')->get();
                
                
                
                  if(count($cliente ) > 0){
                return response()->json([
                    'status'=> true,
                    'data' => $cliente
                ]);
                
                }
                
                
                return response()->json([
                    'status'=> false,
                    'message' =>"servico não encontrado"
                 ]);
                
                }
        public function updateCliente(Request $request){
        $cliente = Cliente::find($request->id);
    
        if(!isset($cliente)){
            return response()->json([
                'status' => 'servico não encontrado'
            ]);
        }
    if(isset($request->nome)){
        $cliente->nome =$request->nome;
    }
    
    if(isset($request->celular)){
        $cliente->celular =$request->celular;
    }
    if(isset($request->email)){
        $cliente->email =$request->email;
    
    }
    if(isset($request->cpf)){
        $cliente->cpf =$request->cpf;
    }
        if(isset($request-> dataNascimento)){
            $cliente-> dataNascimento =$request->dataNascimento;
        }
        
        if(isset($request->cidade)){
            $cliente->cidade =$request->cidade;
        }
        if(isset($request->estado)){
            $cliente->estado =$request->estado;
        
        }
        if(isset($request->pais)){
            $cliente->pais =$request->pais;
        }
            if(isset($request->rua)){
                $cliente->rua =$request->rua;
            }
            
            if(isset($request->numero)){
                $cliente->numero =$request->numero;
            }
           
            if(isset($request->bairro)){
                $cliente->bairro =$request->bairro;
            }
            if(isset($request->cep)){
                $cliente->cep =$request->cep;
            
            }
                if(isset($request->complemento)){
                    $cliente->complemento =$request->complemento;
                }
                
                if(isset($request->senha)){
                    $cliente->senha =$request->senha;
                }
            
                
                                
    
        
    
    $cliente->update();
    
    return response()->json([
    'status' =>true,
    'message'=> 'servico atualizando'
    ]);
    }
    
    
    
    public function ClienteExcluir($id){
        $cliente = Cliente::find($id);
       
        if(!isset($cliente)){
           return response()->json([
          'status' => false,'message' => "servico não encontrado"
           ]);
        }
       
        $cliente->delete();
       
        return response()->json([
       'status' => true, 'message'=> "servico excluído com sucesso"
        ]);
 
       
       }

       public function ClienteEsqueciSenha(Request $request){ 

        $cliente = cliente::where('cpf', '=', $request->cpf)->first(); 

 if(!isset($cliente)){
    return response()->json([
    'status'=> true,
    'message'=> "Cadastro nao encontrado"
    ]);
 }

 $cliente->senha=Hash::make($cliente->cpf);
 
$cliente->update();

return response()->json([
    'status'=> true,
    'message'=> "Cadastro atualizado"
]);


    
    } 
   
    }
       
    


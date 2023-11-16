<?php


namespace App\Http\Controllers;

use App\Http\Requests\clienteFormRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClienteController extends Controller
{
    public function store(clienteFormRequest $request){
        $clientes = Cliente::create([
            'nome' => $request->nome,
            'celular' => $request->celular,
            'email'=>$request->email,
            'cpf'=>$request->cpf,
            'dataNascimento'=>$request->dataNascimento,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado,
            'pais'=>$request->pais,
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'bairro'=>$request->bairro,
            'cep'=>$request->cep,
            'complemento'=>$request->complemento,
            'senha'=>Hash::make($request->senha),
            
        ]);
       
        return response()->json([
            "succes" => true,
            "message" =>"Cliente Cadastrado com sucesso",
            "data" => $clientes
        ],200);
    }

    public function pesquisaPorId($id)
    {
        $cliente = Cliente::find($id);

        if ($cliente == null) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $cliente
        ]);
    }

    public function retornarTodos()
    {
        $clientes = Cliente::all();

        return  response()->json([
          'status'=>true,
          'data'=>$clientes
        ]);
    }

    public function pesquisarPorNome(Request $request){
        $clientes = Cliente::where('nome', 'like', '%'. $request->nome . '%')->get();
    
        if(count($clientes)>0){
            return response()->json([
                'status'=>true,
                'data'=> $clientes
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorCpf(Request $request){
        $clientes= Cliente::where('cpf', 'like', '%'. $request->cpf . '%')->get();
    
        if(count($clientes)>0){
            return response()->json([
                'status'=>true,
                'data'=> $clientes
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }

    public function pesquisarPorCelular(Request $request){
        $clientes = Cliente::where('celular', 'like', '%'. $request->celular . '%')->get();
    
        if(count($clientes)>0){
            return response()->json([
                'status'=>true,
                'data'=> $clientes
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorEmail(Request $request){
        $clientes = Cliente::where('email', 'like', '%'. $request->email . '%')->get();
    
        if(count($clientes)>0){
            return response()->json([
                'status'=>true,
                'data'=> $clientes
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function update(Request $request){
        $clientes = Cliente::find($request->id);
    
        if(!isset($clientes)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }
    
        if(isset($request->nome)){
            $clientes->nome = $request->nome;
        }
        if(isset($request->celular)){
            $clientes->celular= $request->celular;
        }
        if(isset($request->email)){
            $clientes->email = $request->email;
        }
        if(isset($request->cpf)){
            $clientes->cpf = $request->cpf;
        }
        if(isset($request->dataNascimento)){
            $clientes->dataNascimento = $request->dataNascimento;
        }
        if(isset($request->cidade)){
            $clientes->cidade = $request->cidade;
        }
        if(isset($request->estado)){
            $clientes->estado = $request->estado;
        }
        if(isset($request->pais)){
            $clientes->pais = $request->pais;
        }
        if(isset($request->rua)){
            $clientes->rua = $request->rua;
        }
        if(isset($request->numero)){
            $clientes->numero = $request->numero;
        }
        if(isset($request->bairro)){
            $clientes->bairro = $request->bairro;
        }
        if(isset($request->cep)){
            $clientes->cep = $request->cep;
        }
        if(isset($request->complemento)){
            $clientes->complemento = $request->complemento;
        }
        if(isset($request->senha)){
            $clientes->cpf = $request->senha;
        }
        
        $clientes-> update();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    
    }


    public function excluir($id){
        $clientes = Cliente::find($id);
    
        if(!isset($clientes)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encotrado"
            ]);
        }
    
        $clientes->delete();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro excluido com sucesso"
        ]);
    }

    public function esqueciSenha(Request $request){
        $clientes = Cliente::where('cpf', '=', $request->cpf)->first();
        

        if(!isset($cliente)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }
    
       $clientes->senha=Hash::make($clientes->cpf);

        $clientes->update();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    
        
    }

}

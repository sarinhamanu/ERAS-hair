<?php



namespace App\Http\Controllers;


use App\Http\Requests\ProfissionalRequest;
use App\Models\Profissional;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class ProfissionalController extends Controller
{
    public function store(ProfissionalRequest $request){
        $profissional = Profissional::create([
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
            'salario'=>$request->salario,
            
        ]);
       
        return response()->json([
            "succes" => true,
            "message" =>"Profissional Cadastrado com sucesso",
            "data" => $profissional
        ],200);
    }

    
    public function pesquisaPorId($id)
    {
        $profissional = Profissional::find($id);

        if ($profissional == null) {
            return response()->json([
                'status' => false,
                'message' => "Usuário não encontrado"
            ]);
        }

        return response()->json([
            'status' => true,
            'data' => $profissional
        ]);
    }

    public function retornarTodos()
    {
        $profissional = Profissional::all();

        return  response()->json([
          'status'=>true,
          'data'=>$profissional
        ]);
    }

    public function pesquisarPorNome(Request $request){
        $profissional = Profissional::where('nome', 'like', '%'. $request->nome . '%')->get();
    
        if(count($profissional)>0){
            return response()->json([
                'status'=>true,
                'data'=> $profissional
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorCpf(Request $request){
        $profissional = Profissional::where('cpf', 'like', '%'. $request->cpf . '%')->get();
    
        if(count($profissional)>0){
            return response()->json([
                'status'=>true,
                'data'=> $profissional
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }

    public function pesquisarPorCelular(Request $request){
        $profissional = Profissional::where('celular', 'like', '%'. $request->celular . '%')->get();
    
        if(count($profissional)>0){
            return response()->json([
                'status'=>true,
                'data'=> $profissional
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }


    public function pesquisarPorEmail(Request $request){
        $profissional = Profissional::where('email', 'like', '%'. $request->email . '%')->get();
    
        if(count($profissional)>0){
            return response()->json([
                'status'=>true,
                'data'=> $profissional
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
        }

        public function update(Request $request){
            $profissional = Profissional::find($request->id);
        
            if(!isset($profissional)){
                return response()->json([
                    'status' => false,
                    'message' => "Cadastro não encontrado"
                ]);
            }
        
            if(isset($request->nome)){
                $profissional->nome = $request->nome;
            }
            if(isset($request->celular)){
                $profissional->celular= $request->celular;
            }
            if(isset($request->email)){
                $profissional->email = $request->email;
            }
            if(isset($request->cpf)){
                $profissional->cpf = $request->cpf;
            }
            if(isset($request->dataNascimento)){
                $profissional->dataNascimento = $request->dataNascimento;
            }
            if(isset($request->cidade)){
                $profissional->cidade = $request->cidade;
            }
            if(isset($request->estado)){
                $profissional->estado = $request->estado;
            }
            if(isset($request->pais)){
                $profissional->pais = $request->pais;
            }
            if(isset($request->rua)){
                $profissional->rua = $request->rua;
            }
            if(isset($request->numero)){
                $profissional->numero = $request->numero;
            }
            if(isset($request->bairro)){
                $profissional->bairro = $request->bairro;
            }
            if(isset($request->cep)){
                $profissional->cep = $request->cep;
            }
            if(isset($request->complemento)){
                $profissional->complemento = $request->complemento;
            }
            if(isset($request->senha)){
                $profissional->senha = $request->senha;
            }
            if(isset($request->salario)){
                $profissional->salario = $request->salario;
            }
            $profissional-> update();
        
            return response()->json([
                'status' => true,
                'message' => "Cadastro atualizado"
            ]);
        
        }
    
    
        public function excluir($id){
            $profissional = Profissional::find($id);
        
            if(!isset($profissional)){
                return response()->json([
                    'status' => false,
                    'message' => "Cadastro não encotrado"
                ]);
            }
        
            $profissional->delete();
        
            return response()->json([
                'status' => true,
                'message' => "Cadastro excluido com sucesso"
            ]);
        }
           public function exportarCsv()
    {
        $profissional = Profissional::all();


        $nomeArquivo = 'profissional.csv';

        $filePath = storage_path('app/public/' . $nomeArquivo);

        $handle = fopen($filePath, "w");

   


        fputcsv($handle, array('Nome', 'celular', 'Email','CPF', 'DataNascimento','Cidade','Estado', 'Pais', 'Rua', 'Numero','Bairro', 'Cep','Complemento','Senha', 'Salario'), ';');

    foreach($profissional as $u){
        fputcsv($handle, array(
            $u->nome,
            $u->celular,
            $u->email,
            $u->cpf,
            $u->dataNascimento,
            $u->cidade,
            $u->estado,
            $u->pais,
            $u->rua,
            $u->numero,
            $u->bairro,
            $u->cep,
            $u->complemento,
            $u->senha,
            $u->salario,
          
            
        ), ';');
    }

fclose($handle);

return Response::download(public_path().'/storage/'.$nomeArquivo)
->deleteFileAfterSend(true);
    }
    public function esqueciSenha(Request $request){
        $profissional = Profissional::where('cpf', '=', $request->cpf)->first();
        

        if(!isset($cliente)){
            return response()->json([
                'status' => false,
                'message' => "Cadastro não encontrado"
            ]);
        }
    
       $profissional->senha=Hash::make($profissional->cpf);

        $profissional->update();
    
        return response()->json([
            'status' => true,
            'message' => "Cadastro atualizado"
        ]);
    
        
    }

}


<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\ServicoFormRequest;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//servico
Route::post('servicoStore',[ServicoController::class, 'servicoStore']);
Route::post('servicoNome',[ServicoController::class, 'pesquisarPorNomeServico']);
Route::post('servicoDescricao',[ServicoController::class, 'pesquisarPorDescricaoServico']);
Route::put('servicoUpdate',[ServicoController::class, 'updateServico']);
Route::delete('deleteServico/{id}',[ServicoController::class, 'deleteServico']);


//cliente
Route::post('store1',[ClienteController::class,'store1']);
Route::post('clienteNome',[ClienteController::class,'pesquisarPorNomeDoCliente']);
Route::post('clienteCPF',[ClienteController::class,'pesquisarPorCPFCliente']);
Route::post('clienteCelular',[ClienteController::class,'pesquisarPorCelularCliente']);
Route::post('clienteEmail',[ClienteController::class,'pesquisarPorEmailCliente']);
Route::put('clienteUpdate',[ClienteController::class,'updateCliente']);
Route::delete('clienteDelete/{id}',[ClienteController::class,'deleteCliente']);
Route::post('clienteEsqueciSenha',[ClienteController::class,'esqueciSenhaCliente']);

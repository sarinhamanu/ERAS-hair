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
Route::post('servico/store',[ServicoController::class, 'servico/store']);
Route::post('nome',[ServicoController::class, 'pesquisarPorNome']);
Route::post('descricao',[ServicoController::class, 'pesquisarPorDescricao']);
Route::put('update',[ServicoController::class, 'update']);
Route::delete('deleteServico/{id}',[ServicoController::class, 'deleteServico']);


//cliente
Route::post('cliente/store',[ClienteController::class,'cliente/store']);
Route::post('nomeDoCliente',[ClienteController::class,'pesquisarPorNomeDoCliente']);
Route::post('cpf',[ClienteController::class,'pesquisarPorCPF']);
Route::post('celular',[ClienteController::class,'pesquisarPorCelular']);
Route::post('email',[ClienteController::class,'pesquisarPorEmail']);
Route::put('updateCliente',[ClienteController::class,'updateCliente']);
Route::delete('delete/{id}',[ClienteController::class,'delete{id}']);
Route::post('esquiSenha',[ClienteController::class,'esqueciSenha']);

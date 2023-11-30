<?php

use App\Http\Controllers\agendaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProfissionalController;
use App\Http\Controllers\ServicoController;
use Illuminate\Http\Request;
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
Route::post('servico/store',[ServicoController::class,'store']);
Route::get('servico/find/{id}', [ServicoController::class, 'pesquisaPorId']); 
Route::get('servico/retornarTodos',[ServicoController::class,'retornarTodos']);
Route::post('servico/nome',[ServicoController::class, 'pesquisarPorNome']);
Route::post('servico/descricao',[ServicoController::class, 'pesquisarPorDescricao']);
Route::delete('servico/delete/{id}',[ServicoController::class, 'excluir']);
Route::put('servico/update', [ServicoController::class, 'update']);

//cliente
Route::post('cliente/cadastro',[ClienteController::class,'store']);
Route::get('cliente/find/{id}',[ClienteController::class,'pesquisaPorId']);
Route::get('cliente/retornarTodos',[ClienteController::class,'retornarTodos']);
Route::post('cliente/procurarNome',[ClienteController::class, 'pesquisarPorNome']);
Route::post('cliente/procurarCpf',[ClienteController::class, 'pesquisarPorCpf']);
Route::post('cliente/procurarCelular',[ClienteController::class, 'pesquisarPorCelular']);
Route::post('cliente/procurarEmail',[ClienteController::class, 'pesquisarPorEmail']);
Route::delete('cliente/excluir/{id}',[ClienteController::class, 'excluir']);
Route::put('cliente/update', [ClienteController::class, 'update']);
Route::post('cliente/esqueciSenha',[ClienteController::class, 'esqueciSenha']);

//profissional
Route::post('Profissional/cadastro',[ProfissionalController::class,'store']);
Route::get('Profissional/find/{id}',[ProfissionalController::class,'pesquisaPorId']);
Route::get('Profissional/retornarTodos',[ProfissionalController::class,'retornarTodos']);
Route::post('Profissional/procurarNome',[ProfissionalController::class, 'pesquisarPorNome']);
Route::post('Profissional/procurarCpf',[ProfissionalController::class, 'pesquisarPorCpf']);
Route::post('Profissional/procurarCelular',[ProfissionalController::class, 'pesquisarPorCelular']);
Route::post('Profissional/procurarEmail',[ProfissionalController::class, 'pesquisarPorEmail']);
Route::delete('Profissional/excluir/{id}',[ProfissionalController::class, 'excluir']);
Route::put('Profissional/atualizar', [ProfissionalController::class, 'update']);
Route::get('Profissional/exportar/csv', [ProfissionalController::class, 'exportarcsv']);
Route::post('Profissional/esqueciSenha',[ProfissionalController::class, 'esqueciSenha']);


//Agendas
Route::post('cadastroAgenda', [agendaController::class, 'store']);
Route::post('procurarAgenda',[agendaController::class, 'pesquisarPorAgenda']);
Route::delete('excluirAgenda/{id}',[agendaController::class, 'excluir']);
Route::put('atualizarAgenda', [agendaController::class, 'update']);
Route::get('retornarTodosAgenda',[agendaController::class, 'retornarTodos']);
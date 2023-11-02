<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autenticar\LoginController;
use App\Http\Controllers\Autenticar\EsqueciSenhaController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GerenciarCampeonatosController;
use App\Http\Controllers\GerenciarUsuariosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class, 'inicio'])->name('home.inicio');

Route::get('/home/inscricao/{id}', [HomeController::class, 'inscricao'])->name('home.inscricao');

Route::post('/home/inscricao', [HomeController::class, 'armazenar'])->name('home.armazenar');

Route::get('/home/torneios', [HomeController::class, 'torneios'])->name('home.torneios');

Route::get('/home/torneio/{id}', [HomeController::class, 'torneio'])->name('home.torneio');

Route::any('/home/torneios', [HomeController::class, 'filtrar'])->name('home.filtrar');

Route::get('/home/area_atleta', [AtletaController::class, 'inicio'])->name('area_atleta.inicio');

/**
 * Rotas de Autenticação e de redefinição de senha dos atletas na aplicação
 */

Route::get('/login_atleta', [LoginController::class, 'indexAtleta'])->name('login_atleta.index');

Route::post('/login_atleta', [LoginController::class, 'loginAtleta'])->name('login_atleta');

Route::get('/logout_atleta', [LoginController::class, 'logoutAtleta'])->name('logout_atleta');

Route::get('/password/reset', [EsqueciSenhaController::class, 'mostrarFormularioReset'])->name('password.request');

Route::post('/password/email', [EsqueciSenhaController::class, 'enviarSenhaEmail'])->name('password.email');

Route::get('/password/email/{token}', [EsqueciSenhaController::class, 'senhaResetLink'])->name('password.reset');

Route::post('/password/update', [EsqueciSenhaController::class, 'senhaUpdate'])->name('password.update');

/**
 * Rotas de Autenticação e de redefinição de senha dos administradores na aplicação
 */

Route::get('/login_administrativo', [LoginController::class, 'indexAdministrativo'])->name('login_administrativo.index');

Route::post('/login_administrativo', [LoginController::class, 'loginAdministrativo'])->name('login_administrativo');

Route::get('/logout_administrativo', [LoginController::class, 'logoutAdministrativo'])->name('logout_administrativo');

/**
 * Rotas responsáveis pelo crud dos usuários
 */
Route::get('/gerenciar_usuarios', [GerenciarUsuariosController::class, 'inicio'])->name('gerenciar_usuarios.inicio');

Route::get('/gerenciar_usuarios/novo', [GerenciarUsuariosController::class, 'novo'])->name('gerenciar_usuarios.novo');

Route::post('/gerenciar_usuarios/novo/armazenar', [GerenciarUsuariosController::class, 'armazenar'])->name('gerenciar_usuarios.armazenar');

Route::get('/gerenciar_usuarios/editar/{id}', [GerenciarUsuariosController::class, 'editar'])->name('gerenciar_usuarios.editar');

Route::post('/gerenciar_usuarios/editar/atualizar/{id}', [GerenciarUsuariosController::class, 'atualizar'])->name('gerenciar_usuarios.atualizar');

Route::delete('/gerenciar_usuarios/excluir/{id}', [GerenciarUsuariosController::class, 'excluir'])->name('gerenciar_usuarios.excluir');

Route::any('/gerenciar_usuarios', [GerenciarUsuariosController::class, 'filtrar'])->name('gerenciar_usuarios.filtrar');

/**
 * Rotas responsáveis pelo crud dos campeonatos
 */
Route::get('/gerenciar_campeonatos', [GerenciarCampeonatosController::class, 'inicio'])->name('gerenciar_campeonatos.inicio');

Route::get('/gerenciar_campeonatos/novo', [GerenciarCampeonatosController::class, 'novo'])->name('gerenciar_campeonatos.novo');

Route::post('/gerenciar_campeonatos/novo/verificar', [GerenciarCampeonatosController::class, 'novoVerificar'])->name('gerenciar_campeonatos.verificar');

Route::post('/gerenciar_campeonatos/novo/crop', [GerenciarCampeonatosController::class, 'crop'])->name('gerenciar_campeonatos.crop');

Route::post('/gerenciar_campeonatos/novo/armazenar', [GerenciarCampeonatosController::class, 'armazenar'])->name('gerenciar_campeonatos.armazenar');

Route::get('/gerenciar_campeonatos/editar/{id}', [GerenciarCampeonatosController::class, 'editar'])->name('gerenciar_campeonatos.editar');

Route::post('/gerenciar_campeonatos/editar/atualizar/{id}', [GerenciarCampeonatosController::class, 'atualizar'])->name('gerenciar_campeonatos.atualizar');

Route::delete('/gerenciar_campeonatos/excluir/{id}', [GerenciarCampeonatosController::class, 'excluir'])->name('gerenciar_campeonatos.excluir');

Route::any('/gerenciar_campeonatos', [GerenciarCampeonatosController::class, 'filtrar'])->name('gerenciar_campeonatos.filtrar');






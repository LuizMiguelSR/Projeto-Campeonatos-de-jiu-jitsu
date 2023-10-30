<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autenticar\LoginController;
use App\Http\Controllers\Autenticar\EsqueciSenhaController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\GerenciarCampeonatoController;
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
    return view('publico.inicio');
})->name('inicio');

/**
 * Rotas de Autenticação e de redefinição de senha dos atletas na aplicação
 */

Route::get('/login_atleta', function () {
    return view('publico.loginAtleta');
})->name('login_atleta');
Route::post('/login_atleta', [LoginController::class, 'loginAtleta'])->name('login_atleta');
Route::get('/logout_atleta', [LoginController::class, 'logoutAtleta'])->name('logout_atleta');

Route::get('/password/reset', [EsqueciSenhaController::class, 'mostrarFormularioReset'])->name('password.request');
Route::post('/password/email', [EsqueciSenhaController::class, 'enviarSenhaEmail'])->name('password.email');
Route::get('/password/email/{token}', [EsqueciSenhaController::class, 'senhaResetLink'])->name('password.reset');
Route::post('/password/update', [EsqueciSenhaController::class, 'senhaUpdate'])->name('password.update');

/**
 * Rotas de Autenticação e de redefinição de senha dos administradores na aplicação
 */

Route::get('/login_administrativo', function () {
    return view('administrativo.loginAdmin');
})->name('login_administrativo');
Route::post('/login_administrativo', [LoginController::class, 'loginAdministrativo'])->name('login_administrativo');
Route::get('/logout_administrativo', [LoginController::class, 'logoutAdministrativo'])->name('logout_administrativo');

Route::get('/password/reset', [EsqueciSenhaController::class, 'mostrarFormularioReset'])->name('password.request');
Route::post('/password/email', [EsqueciSenhaController::class, 'enviarSenhaEmail'])->name('password.email');
Route::get('/password/email/{token}', [EsqueciSenhaController::class, 'senhaResetLink'])->name('password.reset');
Route::post('/password/update', [EsqueciSenhaController::class, 'senhaUpdate'])->name('password.update');


/**
 * Rotas com checagem de role sendo 1 para administrador, 2 para usuarios e 3 para atletas com acesso apenas a role 3
 */

Route::middleware(['checkRole:3'])->group(function () {
    Route::get('/area_atleta', [AtletaController::class, 'index'])->name('area_atleta');
});

/**
 * Rotas com checagem, para acesso apenas para roles 1 e 2
 */
Route::middleware(['checkNotRole:3'])->group(function () {
    /**
     * Rotas responsáveis pelo crud dos usuários
     */
    Route::resource('/gerenciar_usuarios', GerenciarUsuariosController::class);
    Route::get('/gerenciar_usuarios/consulta', [GerenciarUsuariosController::class, 'listar'])->name('gerenciar_usuarios.listar');
    /**
     * Rotas responsáveis pelo crud dos campeonatos
     */
    Route::resource('/gerenciar_campeonatos', GerenciarCampeonatoController::class);
});




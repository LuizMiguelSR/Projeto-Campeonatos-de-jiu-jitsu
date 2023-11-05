<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Autenticar\LoginController;
use App\Http\Controllers\Autenticar\EsqueciSenhaController;
use App\Http\Controllers\Autenticar\EsqueciSenhaAdministrativoController;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ResultadosController;
use App\Http\Controllers\GerenciarCampeonatosController;
use App\Http\Controllers\GerenciarUsuariosController;
use App\Http\Controllers\GerenciarInscricoesController;
use App\Http\Controllers\GerenciarResultadosController;
use App\Http\Controllers\GerenciarChaveamentoController;
use App\Http\Controllers\ChaveamentoController;

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

Route::get('/home/inscricao/{titulo}/{codigo}/{id}', [HomeController::class, 'inscricao'])->name('home.inscricao');

Route::post('/home/inscricao', [HomeController::class, 'armazenar'])->name('home.armazenar');

Route::get('/home/torneios', [HomeController::class, 'torneios'])->name('home.torneios');

Route::get('/home/torneio/{titulo}/{codigo}/{id}', [HomeController::class, 'torneio'])->name('home.torneio');

Route::any('/home/torneios', [HomeController::class, 'filtrar'])->name('home.filtrar');

Route::get('/home/area_atleta', [AtletaController::class, 'inicio'])->name('area_atleta.inicio');

Route::get('/home/area_atleta/certificado', [AtletaController::class, 'certificado'])->name('area_atleta.certificado');

Route::any('/home/area_atleta/certificado/pdf/{pdf?}', [AtletaController::class, 'pdfCertificado'])->name('area_atleta.download_pdf');

Route::get('/home/area_atleta/campeonatos', [AtletaController::class, 'campeonatos'])->name('area_atleta.campeonatos');

Route::get('/home/resultado/{titulo}/{codigo}/{id}', [ResultadosController::class, 'resultado'])->name('resultado.inicio');

Route::get('/home/chaveamento/{titulo}/{codigo}/{id}', [ChaveamentoController::class, 'inicio'])->name('chaveamento.inicio');

Route::get('/home/chaveamento/{titulo}/{codigo}/{id}/{faixa}/{peso}/{sexo}', [ChaveamentoController::class, 'integra'])->name('chaveamento.integra');

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

Route::get('/password/admin/reset', [EsqueciSenhaAdministrativoController::class, 'mostrarFormularioReset'])->name('password_administrativo.request');

Route::post('/password/admin/email', [EsqueciSenhaAdministrativoController::class, 'enviarSenhaEmail'])->name('password_administrativo.email');

Route::get('/password/admin/email/{token}', [EsqueciSenhaAdministrativoController::class, 'senhaResetLink'])->name('password_administrativo.reset');

Route::post('/password/admin/update', [EsqueciSenhaAdministrativoController::class, 'senhaUpdate'])->name('password_administrativo.update');

/**
 * Rotas responsáveis pelo crud dos usuários
 */
Route::get('/gerenciar_usuarios/inicio', [GerenciarUsuariosController::class, 'inicio'])->name('gerenciar_usuarios.inicio');

Route::get('/gerenciar_usuarios/novo', [GerenciarUsuariosController::class, 'novo'])->name('gerenciar_usuarios.novo');

Route::post('/gerenciar_usuarios/novo/armazenar', [GerenciarUsuariosController::class, 'armazenar'])->name('gerenciar_usuarios.armazenar');

Route::get('/gerenciar_usuarios/editar/{id}', [GerenciarUsuariosController::class, 'editar'])->name('gerenciar_usuarios.editar');

Route::post('/gerenciar_usuarios/editar/atualizar/{id}', [GerenciarUsuariosController::class, 'atualizar'])->name('gerenciar_usuarios.atualizar');

Route::get('/gerenciar_usuarios/editar/senha/{id}', [GerenciarUsuariosController::class, 'senhaEditar'])->name('gerenciar_usuarios.editar_senha');

Route::post('/gerenciar_usuarios/editar/senha/atualizar/{id}', [GerenciarUsuariosController::class, 'senhaAtualizar'])->name('gerenciar_usuarios.atualizar_senha');

Route::delete('/gerenciar_usuarios/excluir/{id}', [GerenciarUsuariosController::class, 'excluir'])->name('gerenciar_usuarios.excluir');

Route::any('/gerenciar_usuarios', [GerenciarUsuariosController::class, 'filtrar'])->name('gerenciar_usuarios.filtrar');

/**
 * Rotas responsáveis pelo crud dos campeonatos
 */
Route::get('/gerenciar_campeonatos/inicio', [GerenciarCampeonatosController::class, 'inicio'])->name('gerenciar_campeonatos.inicio');

Route::get('/gerenciar_campeonatos/novo', [GerenciarCampeonatosController::class, 'novo'])->name('gerenciar_campeonatos.novo');

Route::post('/gerenciar_campeonatos/novo/verificar', [GerenciarCampeonatosController::class, 'novoVerificar'])->name('gerenciar_campeonatos.verificar');

Route::post('/gerenciar_campeonatos/novo/crop', [GerenciarCampeonatosController::class, 'crop'])->name('gerenciar_campeonatos.crop');

Route::post('/gerenciar_campeonatos/novo/armazenar', [GerenciarCampeonatosController::class, 'armazenar'])->name('gerenciar_campeonatos.armazenar');

Route::get('/gerenciar_campeonatos/editar/{id}', [GerenciarCampeonatosController::class, 'editar'])->name('gerenciar_campeonatos.editar');

Route::post('/gerenciar_campeonatos/editar/atualizar/{id}', [GerenciarCampeonatosController::class, 'atualizar'])->name('gerenciar_campeonatos.atualizar');

Route::delete('/gerenciar_campeonatos/excluir/{id}', [GerenciarCampeonatosController::class, 'excluir'])->name('gerenciar_campeonatos.excluir');

Route::any('/gerenciar_campeonatos', [GerenciarCampeonatosController::class, 'filtrar'])->name('gerenciar_campeonatos.filtrar');

Route::get('/gerenciar_campeonatos/destaques', [GerenciarCampeonatosController::class, 'destaques'])->name('gerenciar_campeonatos.destaques');

Route::post('/gerenciar_campeonatos/destaques/armazenar', [GerenciarCampeonatosController::class, 'destaqueSalvar'])->name('gerenciar_campeonatos.destaques_salvar');

/**
 * Rotas responsáveis pela visualização das inscrições em campeonatos na área admnistrativo
 */
Route::get('/gerenciar_inscricoes/inicio', [GerenciarInscricoesController::class, 'inicio'])->name('gerenciar_inscricoes.inicio');

Route::any('/gerenciar_inscricoes', [GerenciarInscricoesController::class, 'filtrar'])->name('gerenciar_inscricoes.filtrar');

Route::any('/gerenciar_inscricoes/download/pdf', [GerenciarInscricoesController::class, 'pdfInscricoes'])->name('gerenciar_inscricoes.download_pdf');

Route::any('/gerenciar_inscricoes/download/csv', [GerenciarInscricoesController::class, 'csvInscricoes'])->name('gerenciar_inscricoes.download_csv');


/**
 * Rotas responsáveis pelos chaveamentos dos atletas
 */
Route::get('/gerenciar_chaveamentos/inicio', [GerenciarChaveamentoController::class, 'inicio'])->name('gerenciar_chaveamentos.inicio');

Route::get('/gerenciar_chaveamentos/gerar_chaveamento/{campeonatoId}', [GerenciarChaveamentoController::class, 'gerarChaves'])->name('gerenciar_chaveamentos.gerarChaves');

/**
 * Rotas responsáveis pelos resultados dos campeonatos
 */
Route::get('/gerenciar_resultados/inicio', [GerenciarResultadosController::class, 'inicio'])->name('gerenciar_resultados.inicio');

Route::get('/gerenciar_resultados/upload/{id}', [GerenciarResultadosController::class, 'upload'])->name('gerenciar_resultados.upload');

Route::post('/gerenciar_resultados/upload/enviar/{id}', [GerenciarResultadosController::class, 'importarCSV'])->name('gerenciar_resultados.enviar');

Route::get('/gerenciar_resultados/download/{arquivo}', [GerenciarResultadosController::class, 'download'])->name('gerenciar_resultados.download');

Route::any('/gerenciar_resultados', [GerenciarResultadosController::class, 'filtrar'])->name('gerenciar_resultados.filtrar');


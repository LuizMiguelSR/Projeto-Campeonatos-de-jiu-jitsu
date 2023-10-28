<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AtletaController;
use App\Http\Controllers\Auth\CustomForgotPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('publico.inicio');
})->name('inicio');

Route::get('/login_atleta', function () {
    return view('publico.loginAtleta');
})->name('login_atleta');

Auth::routes();

Route::get('/area_atleta', [App\Http\Controllers\AtletaController::class, 'index'])->name('area_atleta');

Route::get('/password/reset', [App\Http\Controllers\Auth\CustomForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/password/email', [App\Http\Controllers\Auth\CustomForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');


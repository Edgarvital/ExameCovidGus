<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/formulario', [\App\Http\Controllers\HomeController::class, 'formulario'])->name('formulario');
Route::post('/formulario/criar', [\App\Http\Controllers\HomeController::class, 'criarFormulario'])->name('criar_formulario');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/solicitar', [\App\Http\Controllers\SolicitacaoController::class, 'criarSolicitacao'])->name('solicitar');



Route::get('/home', function () {
    return redirect(route('home'));
});

Route::middleware(['auth'])->group(function () {
    Route::post('/criarPonto', [\App\Http\Controllers\UsuarioController::class, 'criarPonto'])->name('criar_ponto');
    Route::get('/cadastrarPonto', [App\Http\Controllers\UsuarioController::class, 'cadastrarPonto'])->name('cadastrar_ponto');
    Route::post('/gerarDias', [\App\Http\Controllers\UsuarioController::class, 'gerarDiasPonto'])->name('gerar_dias_ponto');

    Route::get('/pontos', [\App\Http\Controllers\UsuarioController::class, 'listarPontos'])->name('pontos');
});

Auth::routes();


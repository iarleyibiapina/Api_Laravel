<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{UserController, NoticiaController};

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return "Está rota será chamada se usuario não logado";
})->name('login');

// Rotas para consumo

// Poderia passar um midleware para caso apenas usuarios especificos pudessem acessar

// controller() - usa o mesmo controller para todas rotas dentro do grupo
// group() - reune e separa rotas 
// prefix() - é como a url será exibida, com o acréscimo de cada rota definida.
// as() - é o nome de cada rota, será utilizado no controller

// alterar para usar middleware
Route::controller(NoticiaController::class)->middleware('auth:api')->prefix('sistema')->as('noticias')->group(function () {
    Route::get('noticias', 'index')->name('index')->middleware('jwt.auth');
    Route::get('noticias/{idNoticia}', 'show')->name('show');
    Route::post('noticias', 'store')->name('store');
    Route::put('noticias/{idNoticia}', 'update')->name('update');
    Route::delete('noticias/{idNoticia}', 'destroy')->name('destroy');
});

// Rotas para autenticação e criação de usuarios
Route::controller(UserController::class)->prefix('sistema')->as('usuario')->group(function () {
    Route::post('registrar', 'registrar')->name('registrar');
    Route::post('logar', 'logar')->name('logar');
});

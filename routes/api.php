<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticiaController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return "Olá";
});

// Rotas para consumo

// Poderia passar um midleware para caso apenas usuarios especificos pudessem acessar

// controller() - usa o mesmo controller para todas rotas dentro do grupo
// group() - reune e separa rotas 
// prefix() - é como a url será exibida, com o acréscimo de cada rota definida.
// as() - é o nome de cada rota, será utilizado no controller
Route::controller(NoticiaController::class)->prefix('sistema')->as('noticias.')->group(function () {
    Route::get('noticias', 'index');
    Route::get('noticias/{idNoticia}', 'show');
    Route::post('noticias/{idNoticia}', 'store');
    Route::put('noticias/{idNoticia}', 'update');
    Route::delete('noticias/{idNoticia}', 'destroy');
});

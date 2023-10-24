<?php

use App\Http\Controllers\api\PessoaController;
use App\Http\Controllers\api\PortariaController;
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


//chamada da rota http://localhost:800/api/ ->

//rodar o php artisan route:list


/**
 * GET|HEAD  api/pessoa ................................................................................................................................ api\PessoaController@index  
 * POST      api/pessoa ................................................................................................................................ api\PessoaController@store  
 * GET|HEAD  api/pessoa/proc/{nome} ..................................................................................................................... api\PessoaController@show  
 * DELETE    api/pessoa/{id} ......................................................................................................................... api\PessoaController@destroy  
 * PUT       api/pessoa/{id} .......................................................................................................................... api\PessoaController@update 
 */

Route::get('/pessoa', [PessoaController::class, 'index']);                      //ok
Route::delete('/pessoa/{id}', [PessoaController::class, 'destroy']);            //ok
Route::post('/pessoa',[PessoaController::class, 'store']);                      //ok
Route::get('/pessoa/proc/{nome}', [PessoaController::class, 'show']);           //ok
Route::put('/pessoa/{id}',[PessoaController::class, 'update']);                 //ok
//Route::get('/pessoa/edit/{id}',[PessoaController::class, 'edit']);            //-falta

//Portaria rotas
//chamada da rota http://localhost:800/api/ ->
Route::get('/portaria', [PortariaController::class, 'index']);
Route::delete('/portaria/{id}', [PortariaController::class, 'destroy']);
Route::post('/portaria', [PortariaController::class, 'store']);
Route::get('/portaria/proc/{nome}', [PortariaController::class, 'show']);
Route::put('/portaria/{id}', [PortariaController::class, 'update']);




















/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
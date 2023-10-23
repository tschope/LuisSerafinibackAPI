<?php

use App\Http\Controllers\api\PessoaController;
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

Route::get('/pessoa', [PessoaController::class, 'index']);                      //ok
Route::delete('/pessoa/{id}', [PessoaController::class, 'destroy']);            //ok
Route::post('/pessoa',[PessoaController::class, 'store']);                      //ok
Route::get('/pessoa/proc/{nome}', [PessoaController::class, 'show']);           //ok
Route::put('/pessoa/{id}',[PessoaController::class, 'update']);                 //-falta

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
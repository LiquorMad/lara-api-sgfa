<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConcelhoController;
use App\Http\Controllers\EstadoController;
use App\Http\Controllers\FilaInController;
use App\Http\Controllers\FilaOutController;
use App\Http\Controllers\IlhaController;
use App\Http\Controllers\PunicaoController;
use App\Http\Controllers\RotaController;
use App\Http\Controllers\TipoUtilizadorController;
use App\Http\Controllers\TipoVeiculoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ZonaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('login',[AuthController::class,'login']);


Route::middleware('auth:sanctum')->post('/logout', function (Request $request) {
    return $request->user()->tokens()->delete();
});
Route::middleware('auth:sanctum')->get('/recoveryUserInformation', function (Request $request) {
    return $request->user();
});
Route::post('register',[AuthController::class,'register']);

Route::middleware('auth:sanctum')->group(function(){
    Route::apiResource('users', UserController::class);
    Route::apiResource('concelhos', ConcelhoController::class);
    Route::apiResource('estados', EstadoController::class);
    Route::apiResource('fila_ins', FilaInController::class);

    Route::get('/fila_ins/my_turn/{matricula}',[FilaInController::class,'myTurn']);

    Route::apiResource('fila_outs', FilaOutController::class);
    Route::apiResource('ilhas', IlhaController::class);
    Route::apiResource('punicoes', PunicaoController::class);
    Route::apiResource('rotas', RotaController::class);
    Route::apiResource('tipo_utilizadores', TipoUtilizadorController::class);
    Route::apiResource('tipo_veiculos', TipoVeiculoController::class);
    Route::apiResource('veiculos', VeiculoController::class);
    Route::apiResource('zonas', ZonaController::class);
});
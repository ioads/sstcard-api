<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ParceiroController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\PlanoController;
use App\Http\Controllers\AssinaturaController;
use App\Http\Controllers\CepController;

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => 'api'], function ($router) {
    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClienteController::class, 'index']);
        Route::get('/{id}', [ClienteController::class, 'show']);
        Route::put('/status/{id}', [ClienteController::class, 'status']);
        Route::get('/prontuario/{numero}', [ClienteController::class, 'consultaNumeroProntuario']);
    });
    Route::prefix('parceiros')->group(function () {
        Route::get('/', [ParceiroController::class, 'index']);
        Route::get('/{id}', [ParceiroController::class, 'show']);
        Route::put('/{id}', [ParceiroController::class, 'update']);
        Route::put('/status/{id}', [ParceiroController::class, 'status']);
        Route::post('/', [ParceiroController::class, 'store']);
    });
    Route::prefix('vendas')->group(function () {
        Route::get('/', [VendaController::class, 'index']);
        Route::get('/{id}', [VendaController::class, 'show']);
        Route::put('/{id}', [VendaController::class, 'update']);
        Route::post('/', [VendaController::class, 'store']);
    });
    Route::prefix('planos')->group(function () {
        Route::get('/', [PlanoController::class, 'index']);
        Route::get('/{id}', [PlanoController::class, 'show']);
    });
    Route::prefix('assinaturas')->group(function () {
        Route::get('/', [AssinaturaController::class, 'index']);
        Route::post('/', [AssinaturaController::class, 'store']);
    });
    Route::get('address/{cep}', [CepController::class, 'cep']);
});
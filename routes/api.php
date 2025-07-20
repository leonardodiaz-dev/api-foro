<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForoController;
use App\Http\Controllers\RespuestaController;
use App\Http\Controllers\SubForoController;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdminAuth;
use App\Http\Middleware\IsModeradorAuth;
use App\Http\Middleware\IsUserAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {

    Route::middleware([IsModeradorAuth::class])->group(function () {
        Route::patch('temas/{tema}/cerrar', [TemaController::class, 'cerrarTema']);
    });

    Route::resource('foros', ForoController::class)->except(['store', 'destroy', 'update']);
    Route::resource('subforos', SubForoController::class)->except(['store', 'update', 'destroy']);
    Route::resource('temas', TemaController::class)->except(['store,update,destroy']);

    Route::prefix('auth')->group(function () {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
    Route::middleware([IsUserAuth::class])->group(function () {
        Route::resource('temas', TemaController::class)->only(['store,update,destroy']);
        Route::resource('respuestas', RespuestaController::class);
    });
    Route::middleware([IsAdminAuth::class])->group(function () {
        Route::get('users', [UserController::class, 'index']);
        Route::resource('subforos', SubForoController::class)->only(['store', 'update', 'destroy']);
        Route::resource('foros', ForoController::class)->only(['store', 'destroy', 'update']);
        Route::delete('users/{id}', [UserController::class, 'destroy']);
    });
});

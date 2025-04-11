<?php

use App\Http\Controllers\UserProfile\UserProfileController;
use App\Http\Controllers\Usuarios\UsuariosController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\UserProfileHistory\UserProfileHistoryController;
use \App\Http\Controllers\UserProfilePermition\UserProfilePermitionController;
use App\Http\Controllers\UserProfileInfo\UserProfileInfoController;
use App\Http\Controllers\UserProfileSuport\UserProfileSuportController;

// Rotas para o módulo UserProfile
Route::prefix('userprofile')->group(function () {
    Route::get(uri: 'index', action: [UserProfileController::class, 'index'])->name(name: 'UserProfile.index');
    Route::post(uri: 'feedback', action: [UserProfileController::class, 'feedback'])->name(name: 'feedback.store');

    Route::get(uri: 'info', action: [UserProfileInfoController::class, 'index'])->name(name: 'UserProfileInfo.index');

    Route::get(uri: 'permitions', action: [UserProfilePermitionController::class, 'index'])->name('UserProfilePermition.index');

    Route::get(uri: 'history', action: [UserProfileHistoryController::class, 'index'])->name(name: 'UserProfileHistory.index');

    Route::get(uri: 'suport', action: [UserProfileSuportController::class, 'index'])->name(name: 'UserProfileSuport.index');


    // outras permições

    Route::post(uri: 'autoriza-atendimento', action: [UsuariosController::class, 'authorized'])->name(name: 'authorize.atent');

    Route::prefix('funcionarios')->group(function () {

        Route::get('lista', [\App\Http\Controllers\Usuarios\UsuariosController::class, 'index'])->name('usuarios.index');
        Route::post('criar-novo', [\App\Http\Controllers\Usuarios\UsuariosController::class, 'store'])->name('usuarios.store');
        Route::post('store-permisson', [\App\Http\Controllers\Usuarios\UsuariosController::class, 'storePermisson'])->name('permission.store');

    })->middleware(['auth', 'verified']);

})->middleware(['auth', 'verified']);


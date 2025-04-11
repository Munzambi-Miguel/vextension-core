<?php

use Illuminate\Support\Facades\Route;

// Rotas para o módulo Procedimento
Route::prefix('procedimento')->group(function () {

    Route::get('index', [\App\Http\Controllers\Procedimento\ProcedimentoController::class, 'index'])->name('Procedimento.index');

    Route::post('index', [\App\Http\Controllers\Procedimento\ProcedimentoController::class, 'store'])->name('Procedimento.store');
    Route::post('valores', [\App\Http\Controllers\Procedimento\ProcedimentoController::class, 'storeAddValue'])->name('Procedimento.storeAddValue');

    Route::get('index/{id}', [\App\Http\Controllers\Procedimento\ProcedimentoController::class, 'initOrganization'])->name('Procedimento.init.prest');

    Route::post('index-finish', [\App\Http\Controllers\Procedimento\ProcedimentoController::class, 'finish'])->name('Procedimento.finish');

})->middleware(['auth', 'verified']);
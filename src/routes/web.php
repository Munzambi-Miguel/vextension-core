<?php


Route::prefix('/')->group(function () {

    // Rotas para o módulo ProdutoServico
    Route::prefix('produtoservico')->group(function () {
        Route::get('index', [\App\Http\Controllers\ProdutoServico\ProdutoServicoController::class, 'index'])->name('ProdutoServico.index');
    })->middleware(['auth', 'verified']);



    // Rotas para o módulo TipoProcedimento
    Route::prefix('tipoprocedimento')->group(function () {
        Route::get('index', [\App\Http\Controllers\TipoProcedimento\TipoProcedimentoController::class, 'index'])->name('TipoProcedimento.index');
        Route::post('index', [\App\Http\Controllers\TipoProcedimento\TipoProcedimentoController::class, 'store'])->name('TipoProcedimento.store');

        Route::post('find-tipe-instante', [\App\Http\Controllers\TipoProcedimento\TipoProcedimentoController::class, 'findOne'])->name('tipo.procediemto');

    })->middleware(['auth', 'verified']);


    // Rotas para o módulo Cobertura
    Route::prefix('cobertura')->group(function () {
        Route::get('index', [\App\Http\Controllers\Cobertura\CoberturaController::class, 'index'])->name('Cobertura.index');
        Route::post('index', [\App\Http\Controllers\Cobertura\CoberturaController::class, 'store'])->name('Cobertura.store');
    })->middleware(['auth', 'verified']);


    // Rotas para o módulo PrimaryCobertura

    Route::prefix('primarycobertura')->group(function () {
        Route::get('index', [\App\Http\Controllers\PrimaryCobertura\PrimaryCoberturaController::class, 'index'])->name('PrimaryCobertura.index');
        Route::post('index', [\App\Http\Controllers\PrimaryCobertura\PrimaryCoberturaController::class, 'store'])->name('PrimaryCobertura.store');
    })->middleware(['auth', 'verified']);


})->middleware(['auth', 'verified']);
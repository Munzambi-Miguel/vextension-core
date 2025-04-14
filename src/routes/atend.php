<?php

use Illuminate\Support\Facades\Route;
Route::prefix('/')->group(function () {

    // Rotas para o módulo PreAuthorizedHistory
    Route::prefix('pre-autorizado')->group(function () {

        Route::get('index', [\App\Http\Controllers\PreAuthorizedHistory\PreAuthorizedHistoryController::class, 'index'])->name('PreAuthorizedHistory.index');
        Route::get('/{uid}', [\App\Http\Controllers\PreAuthorizedHistory\PreAuthorizedHistoryController::class, 'indexWithKey'])->name('PreAuthorizedHistory.index.uid');


    })->middleware(['auth', 'verified']);

    // Rotas para o módulo HistoricoAtendimento
    Route::prefix('historico')->group(function () {
        Route::get('inicio', [\App\Http\Controllers\HistoricoAtendimento\HistoricoAtendimentoController::class, 'index'])->name('HistoricoAtendimento.index');
        Route::get('/{uid}', [\App\Http\Controllers\HistoricoAtendimento\HistoricoAtendimentoController::class, 'getWithUid'])->name('HistoricoAtendimento.uid.find');
        Route::post('anular-guia', [\App\Http\Controllers\HistoricoAtendimento\HistoricoAtendimentoController::class, 'anularGuia'])->name('HistoricoAtendimento.anular');
        Route::post('autorize-guia', [\App\Http\Controllers\HistoricoAtendimento\HistoricoAtendimentoController::class, 'authorized'])->name('HistoricoAtendimento.autorize');
        Route::post('autorize-reguia', [\App\Http\Controllers\HistoricoAtendimento\HistoricoAtendimentoController::class, 'regerarPDF'])->name('HistoricoAtendimento.regerPdf');
    })->middleware(['auth', 'verified']);



    // Rotas para o módulo AuthorizedHistory
    Route::prefix('autorizadas')->group(function () {
        Route::get('index', [\App\Http\Controllers\AuthorizedHistory\AuthorizedHistoryController::class, 'index'])->name('AuthorizedHistory.index');
        Route::get('/{uid}', [\App\Http\Controllers\AuthorizedHistory\AuthorizedHistoryController::class, 'indexWithEntity'])->name('AuthorizedHistory.index.uid');
    })->middleware(['auth', 'verified']);


    Route::get('/download-pdf/{filename}', [App\Http\Controllers\Atendimento\AtendimentoController::class, 'downloadPdf'])->name('atendimento.download');



    // Rotas para o módulo Atendimento
    Route::prefix('atendimento')->group(function () {

        Route::get('inicio', [\App\Http\Controllers\Atendimento\AtendimentoController::class, 'index'])
            ->name('Atendimento.index');



        Route::get('/{uid}', [\App\Http\Controllers\Atendimento\AtendimentoController::class, 'prestadoreAttent'])->name('antent.init');

        Route::post('init-atenimento', [\App\Http\Controllers\Atendimento\AtendimentoController::class, 'init'])->name('Atendimento.init');

        Route::post('oneBen-atenimento', [\App\Http\Controllers\Atendimento\AtendimentoController::class, 'oneBen'])->name('Atendimento.oneBen');

        Route::post('{uid}/finish-atenimento', [\App\Http\Controllers\Atendimento\AtendimentoController::class, 'store'])->name('Atendimento.store');

        Route::get('pdf-guia', [\App\SPDF\PDFController::class, 'generatePDF']);



        // Rotas para o módulo GuiaAtendimento


        Route::get('/{uid}/guia-atendimento', [\App\Http\Controllers\GuiaAtendimento\GuiaAtendimentoController::class, 'index'])->name('GuiaAtendimento.index');
        Route::get('/{uid}/finalizando', [\App\Http\Controllers\FinalGuiaAtendimento\FinalGuiaAtendimentoController::class, 'index'])->name('FinalGuiaAtendimento.index');



    })->middleware(['auth', 'verified']);

})->middleware(['auth', 'review.all']);

Route::post('/download-guia-pdf', [App\Http\Controllers\Atendimento\AtendimentoController::class, 'downloadPdfBlob'])->name('pdf.download.post');
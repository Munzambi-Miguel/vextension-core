<?php

use Illuminate\Support\Facades\Route;

Route::prefix('beneficiario')->group(function () {


    Route::post(uri: 'benefix-find', action: [\App\Http\Controllers\Beneficiario\BenefixHelpController::class, 'find'])->name('extra.benefix.find');


})->middleware(['auth', 'verified']);
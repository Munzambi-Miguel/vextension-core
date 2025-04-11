<?php

use App\Http\API\CodeController;
use App\Http\Archives\CoberturaPreparExcelController;
use App\Http\Archives\SubCoberturaPreparExcelController;
use App\Http\Archives\TipoAtendimentoPreparExcelController;
use App\Http\Archives\TipoProcedimentoPreparExcelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('search', \App\Http\API\APIGenericController::class);
Route::get('not-search', [\App\Http\API\APIGenericController::class, 'indexNotSearch'])->name('notSearch.index');
Route::get('concat-search', [\App\Http\API\APIGenericController::class, 'indexConcat'])->name('concatSearch.index');
Route::get('/others', [\App\Http\API\APIGenericController::class, 'othersRequest'])->name('others');
Route::get('indexReturnKeyCod', [\App\Http\API\APIGenericController::class, 'indexReturnKeyCod'])->name('search.code');
Route::get('indexParent', [\App\Http\API\APIGenericController::class, 'indexParent'])->name('search.parent');

Route::post('temp-storage', [\App\Http\API\ActionTempController::class, 'store'])->name('temp.store');
Route::post('temp-show', [\App\Http\API\ActionTempController::class, 'store'])->name('temp.show');
Route::post('download-excelModel', [\App\Http\Archives\ProcPreparExcelController::class, 'prepare'])->name('download.excelModel');
Route::post('download-excelDados', [\App\Http\Archives\ProcPreparExcelController::class, 'downloadDadosExcel'])->name('download.excelDados');
Route::get('download-excelModel/{filename}', [\App\Http\Archives\ProcPreparExcelController::class, 'downloadExcel'])->name('download.new');
Route::post('/new-code', [CodeController::class, 'generateCode'])->name('new.code');
Route::post('/new-json', [CodeController::class, 'initJSON'])->name('init.table');
Route::post('/download-coberturas', [CoberturaPreparExcelController::class, 'prepare'])->name('download.cobertura.in');
Route::post('/download-cobSimple', [CoberturaPreparExcelController::class, 'downloadExcel'])->name('download.cobSimple');

// linha dos controladores para gerar o excel
Route::post('/download-subcoberturas', [SubCoberturaPreparExcelController::class, 'prepare'])->name('download.sub.cobertuar');
Route::post('/download-subcobSimple', [SubCoberturaPreparExcelController::class, 'downloadExcel'])->name('download.sub.cobSimple');

Route::post('/store-excel', [\App\Http\STORE\CoberturaExcelController::class, 'store'])->name('cobertura.excel.store');
Route::post('/store-excel-sub', [\App\Http\STORE\SubCoberturaExcelController::class, 'store'])->name('cobertura.sub.excel.store');

//Baixar o excel vazio
Route::post('/download-tipo-atendimento', [TipoAtendimentoPreparExcelController::class, 'downloadExcel'])->name('download.tipoAtendimento');
// baixar o excel com os dados
Route::post('/download-tipo-atendimento-prepare', [TipoAtendimentoPreparExcelController::class, 'prepare'])->name('download.tipo.atendimento');

//Baixar o excel vazio
Route::post('/download-prestadores', [\App\Http\Archives\PrestadoresPreparExcelController::class, 'downloadExcel'])->name('download.prestadores.excelVazio');
// baixar o excel com os dados
Route::post('/download-prestadores-prepare', [\App\Http\Archives\PrestadoresPreparExcelController::class, 'prepare'])->name('download.prestadores');

//Baixar o excel vazio
Route::post('/download-empresas', [\App\Http\Archives\EmpresaPreparExcelController::class, 'downloadExcel'])->name('download.empresas.excelVazio');
// baixar o excel com os dados
Route::post('/download-empresas-prepare', [\App\Http\Archives\EmpresaPreparExcelController::class, 'prepare'])->name('download.empresas');

//Baixar o excel vazio
Route::post('/download-beneficiario', [\App\Http\Archives\BeneficiarioPreparExcelController::class, 'downloadExcel'])->name('download.beneficiario.excelVazio');
// baixar o excel com os dados
Route::post('/download-beneficiario-prepare', [\App\Http\Archives\BeneficiarioPreparExcelController::class, 'prepare'])->name('download.beneficiario');


Route::post('/download-tipo-procedimento', [TipoProcedimentoPreparExcelController::class, 'downloadExcel'])->name('download.tipo.procedimento.excelVazio');
Route::post('/download-coberturas', [TipoProcedimentoPreparExcelController::class, 'prepare'])->name('download.tipoProcedimento.in');
Route::post('/store-excel', [\App\Http\STORE\TipoProcedimentoExcelController::class, 'store'])->name('tipoProcedimento.excel.store');

Route::post('/download-plano', [\App\Http\Archives\PlanosPreparExcelController::class, 'downloadExcel'])->name('download.planos.excelModel');

// baixar o excel com os dados
Route::post('/download-plano-prepare', [\App\Http\Archives\PlanosPreparExcelController::class, 'prepare'])->name('download.planos');



Route::get('check-auth', [\App\Http\Auth\AuthController::class, 'index'])->name('check-auth.index');






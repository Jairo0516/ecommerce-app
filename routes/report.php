<?php

use App\Http\Controllers\PurchasesHistoryController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::prefix('report')->group(function () {

    Route::get('list', [ReportController::class, 'all'])->name('report/list');

    Route::get('/create', function () {
        return Inertia::render('Reports/CreateReport');
    })->middleware(['auth', 'verified'])->name('reports/CreateReport');

    Route::post('register', [ReportController::class, 'store'])->name("reports.store");


})->middleware(['auth', 'verified']);




Route::get('/reports-export', [PurchasesHistoryController::class, 'export'])->name('export');

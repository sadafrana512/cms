<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FinanceFormController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinanceController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LogoutController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    // Dashboard related routes
    Route::post('/retrieve-data', [DashboardController::class, 'retrieveData'])->name('retrieve-data');
    Route::get('/retrieve-data', [DashboardController::class, 'table'])->name('table');
    Route::post('/update-paid-status', [FinanceController::class, 'updatePaidStatus'])->name('update-paid-status');
    Route::get('/generate-challan/{program}/{session}/{class}', [DashboardController::class, 'generateChallan'])->name('generateChallan');
    Route::post('/save-challan-data', [DashboardController::class, 'saveChallanData'])->name('save-challan-data');

    // Finance form routes
    Route::get('/feechallan', function () { return view('feechallan'); });
    Route::get('/dash', function () { return view('next-page'); });
    Route::get('/financeform', [FinanceFormController::class, 'show'])->name('show');
    Route::post('/financeform', [FinanceFormController::class, 'store'])->name('financeForm.store');
    Route::get('/feeadjustment', [FinanceFormController::class, 'feeadjustment'])->name('feeadjustment');
    Route::post('/feeadjustment', [FinanceFormController::class, 'store1'])->name('feeadjustment.store1');

    // Form related routes
    Route::get('/form', [FormController::class, 'showForm'])->name('showForm');
    Route::get('/fetch-data/{profile_id}', [FormController::class, 'fetchData'])->name('fetchData');
    Route::post('/form', [FormController::class, 'requestForm'])->name('requestForm');
    
    // Logout route
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

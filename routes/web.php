<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandphoneController;
use App\Http\Controllers\Admin\CriteriaController as AdminCriteriaController;
use App\Http\Controllers\Admin\HandphoneController as AdminHandphoneController;
use App\Http\Controllers\RecommendationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-topsis', function () {
    return view('about');
})->name('about.topsis');

Route::get('/handphone', [HandphoneController::class, 'index'])->name('handphone.index');
Route::get('/handphone/{id}', [HandphoneController::class, 'show'])->name('handphone.detail');

Route::get('/recommendation', [RecommendationController::class, 'index'])->name('recommendation');
Route::post('/recommendation/result', [RecommendationController::class, 'result'])->name('recommendation.result');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.handphone.index');
    });
    Route::resource('criteria', AdminCriteriaController::class);
    Route::resource('handphone', AdminHandphoneController::class);
});

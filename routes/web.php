<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\RecommendationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recommendation', [RecommendationController::class, 'index'])->name('recommendation');
Route::post('/recommendation/result', [RecommendationController::class, 'result'])->name('recommendation.result');

Route::prefix('admin')->group(function () {
    Route::resource('criteria', CriteriaController::class);
});

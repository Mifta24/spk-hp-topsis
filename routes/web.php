<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecommendationController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recommendation', [RecommendationController::class, 'index'])->name('recommendation');

Route::prefix('admin')->group(function () {
    Route::resource('criteria', CriteriaController::class);
});

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/recommendation', [RecommendationController::class, 'index'])->name('recommendation');

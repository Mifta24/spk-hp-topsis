<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandphoneController;
use App\Http\Controllers\Admin\CriteriaController as AdminCriteriaController;
use App\Http\Controllers\Admin\HandphoneController as AdminHandphoneController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
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

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Resource Routes
    Route::resource('criteria', AdminCriteriaController::class);
    Route::resource('handphone', AdminHandphoneController::class);

    // Profile Routes
    Route::get('/profile', [AdminProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [AdminProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password');
});

// Auth Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

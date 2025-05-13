<?php

use App\Models\Brand;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HandphoneController;
use App\Http\Controllers\admin\BrandController as AdminBrandController;
use App\Http\Controllers\RecommendationController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\CriteriaController as AdminCriteriaController;
use App\Http\Controllers\Admin\HandphoneController as AdminHandphoneController;

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

// Compare routes
Route::get('/compare', [App\Http\Controllers\CompareController::class, 'index'])->name('compare.index');
Route::get('/compare/add/{id}', [App\Http\Controllers\CompareController::class, 'add'])->name('compare.add');
Route::get('/compare/remove/{id}', [App\Http\Controllers\CompareController::class, 'remove'])->name('compare.remove');
Route::get('/compare/clear', [App\Http\Controllers\CompareController::class, 'clear'])->name('compare.clear');

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    // Dashboard
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Resource Routes
    Route::resource('criteria', AdminCriteriaController::class);

    Route::delete('/handphone/destroy-multiple', [AdminHandphoneController::class, 'destroyMultiple'])
        ->name('handphone.destroyMultiple');

    Route::resource('handphone', AdminHandphoneController::class);
    Route::resource('brand', AdminBrandController::class);
   
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

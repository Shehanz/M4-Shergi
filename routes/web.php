<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\SenjataController;
use App\Http\Controllers\Admin\AdminController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [AdminController::class, 'admin'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/', [pageController::class, 'home'])->name('home');
Route::get('/about', [pageController::class, 'about'])->name('about');
Route::get('/resume', [pageController::class, 'resume'])->name('resume');
Route::get('/services', [pageController::class, 'services'])->name('services');
Route::get('/portfolio', [pageController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [pageController::class, 'contact'])->name('contact');
Route::get('/terms', [pageController::class, 'terms'])->name('terms');
Route::get('/privacy', [pageController::class, 'privacy'])->name('privacy');

Route::resource('senjata', SenjataController::class);

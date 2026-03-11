<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pageController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\SenjataController;

Route::get('/', [pageController::class, 'home'])->name('home');
Route::get('/about', [pageController::class, 'about'])->name('about');
Route::get('/resume', [pageController::class, 'resume'])->name('resume');
Route::get('/services', [pageController::class, 'services'])->name('services');
Route::get('/portfolio', [pageController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [pageController::class, 'contact'])->name('contact');
Route::get('/terms', [pageController::class, 'terms'])->name('terms');
Route::get('/privacy', [pageController::class, 'privacy'])->name('privacy');

Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');

Route::resource('senjata', SenjataController::class);

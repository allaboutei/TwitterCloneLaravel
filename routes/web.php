<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;




Route::get('', [DashboardController::class, 'index'])->name('dashboard');


Route::resource('ideas', IdeaController::class)->except(['index', 'create', 'show'])->middleware('auth');

Route::resource('ideas', IdeaController::class)->only(['show']);

Route::resource('ideas.comments', CommentController::class)->only(['store'])->middleware('auth');


Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('register');

    Route::post('/register', 'store');

    Route::get('/login', 'login')->name('login');

    Route::post('/login', 'authenticate');

    Route::post('/logout', 'logout')->name('logout');
});

Route::resource('users', UserController::class)->only('show', 'edit', 'update')->middleware('auth');


Route::get('profile', [UserController::class, 'profile'])->middleware('auth')->name('profile');

Route::get('/terms', function () {
    return view('terms');
});

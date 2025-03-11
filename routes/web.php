<?php

use App\Http\Controllers\Api\UselessFactController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DirectController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\FavouritesController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function(){
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});


Route::middleware('guest')->group(function () {
    Route::get('/', [UselessFactController::class, 'index']);
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    
});

Route::middleware('auth')->group(function () {

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('direct', [DirectController::class, 'index'])->name('direct');
    Route::get('public', [PublicController::class, 'index'])->name('public');
    Route::get('group', [GroupController::class, 'index'])->name('group');
    Route::get('favourites', [FavouritesController::class, 'index'])->name('favourites');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile/password', [ProfileController::class, 'passwordUpdate'])->name('profile.password-update');

    Route::get('/friends', [ContactController::class, 'index']);

});


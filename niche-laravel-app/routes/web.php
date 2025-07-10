<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\CheckController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Livewire\Volt\Volt;

// Public Routes
Route::middleware('guest')->group(function () {
    // Home
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Authentication
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

    // Registration
    Route::get('/signup', [SignupController::class, 'showRegistrationForm'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

    //Forgot Password
    //Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    //Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    //Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    //Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    Route::get('/downloads', function () {
        return view('layouts.landing.index', ['page' => 'downloads']);
    })->name('downloads');

    Route::get('/search', function (Request $request) {
        $query = $request->query('q');

        // Example fake results
        $results = [
            [
                'title' => 'SmartFarm: An IoT-based System for Agriculture',
                'author' => 'Jayson L. Santos, Angelica R. Perez',
                'abstract' => 'This study presents SmartFarm, an IoT-based platform to enhance agriculture operations and yield monitoring. It discusses hardware integration, sensor deployment, and web-based visualization.',
                'adviser' => 'Hermos, L.M.',
                'program' => 'BSIT',
                'sy' => '2021',
            ],
        ];

        return view('layouts.landing.index', [
            'page' => 'search',
            'query' => $query,
            'results' => $results,
        ]);
    })->name('search');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    // Settings (your commented section)
    Route::prefix('settings')->group(function () {
        Route::redirect('', 'settings/profile');
        Route::redirect('settings', 'settings/profile');

        Volt::route('profile', 'settings.profile')->name('settings.profile');
        Volt::route('password', 'settings.password')->name('settings.password');
        Volt::route('appearance', 'settings.appearance')->name('settings.appearance');
    });
});

// Check routes (if they need to be public)
Route::get('/check', [CheckController::class, 'index'])->name('check');
Route::get('/button', [CheckController::class, 'button'])->name('check.button');

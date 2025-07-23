<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\UserAccountsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// shows sql errors on laravel.log
DB::listen(function ($query) {
    Log::channel('single')->debug($query->sql . ' | ' . json_encode($query->bindings));
});

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home route (accessible to both guests and logged-in users)
Route::get('/', [HomeController::class, 'index'])->name('home');

// Downloads page
Route::get('/downloads', function () {
    return view('layouts.landing.index', ['page' => 'downloads']);
})->name('downloads');

// Search results for landing table
Route::get('/search', [InventoryController::class, 'search'])->name('search');

// Guest routes (Login, Signup)
Route::middleware('guest')->group(function () {
    // Authentication
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

    // Registration
    Route::get('/signup', [SignupController::class, 'showRegistrationForm'])->name('signup');
    Route::post('/signup', [SignupController::class, 'store'])->name('signup.store');

    // Email verification
    Route::post('/verify-email-code', [VerificationController::class, 'verifyCode'])->name('verify.code');
    Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

    // Forgot Password
    Route::get('/forgot-password', function () {
        return redirect()->route('login');
    })->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

    // Reset Password
    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

    Auth::routes(['verify' => true]);
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    // Admin dashboard
    Route::get('/admin/dashboard', function () {
        return view('layouts.admin-layout.admin-dashboard');
    })->name('admin.dashboard');

    // User-side routes
    Route::get('/user/dashboard', [ProfileController::class, 'showDashboard'])->name('user.dashboard');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/deactivate-request', [ProfileController::class, 'request_deactivation'])->name('account.deactivate-request');

    // Change Password
    Route::put('/password/update', [PasswordController::class, 'update'])->name('password.update');

    // Logout
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| Check Routes
|--------------------------------------------------------------------------
*/

Route::get('/check', [CheckController::class, 'index'])->name('check');
Route::get('/button', [CheckController::class, 'button'])->name('check.button');
Route::get('/user', [CheckController::class, 'user'])->name('check.user');

//admins
//submission
Route::get('/admin/dashboard', [AdminController::class, 'index']);
Route::get('/submission/filtersSubs', [SubmissionController::class, 'filtersSubs']);
Route::get('/submission/data', [SubmissionController::class, 'getSubmissionData']);

//invntory
Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory.store');
Route::get('/inventory/filtersInv', [InventoryController::class, 'FiltersInv']);
Route::get('/inventory/data', [InventoryController::class, 'getInventoryData']);


//users
Route::get('/users/data', [UserAccountsController::class, 'getAllUsers']);


//======================================================================================================================================
Route::get('/check', [CheckController::class, 'showRegistrationForm'])->name('check');

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
use App\Http\Controllers\BackupController;
use App\Imports\InventoryImport;
use App\Http\Controllers\InventoryExportController;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Calculation\MathTrig\Sum;

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
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.reset.update');

    Auth::routes(['verify' => true]);
});

/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    // Admin-side routes

    //ballsack
    Route::get('/admin/users/{user}/permissions', 
    [UserAccountsController::class, 'getUserPermissions'])
    ->middleware(['auth']);

    Route::post('/admin/users/{user}/update-permissions', 
    [UserAccountsController::class, 'updatePermissions'])
    ->middleware(['auth']);

    Route::get('/test-permission-check', function() {
    $user = auth()->user();
    $permissions = array_map('trim', explode(',', $user->permissions));
    
    return [
        'direct_check' => in_array('edit-permissions', $permissions),
        'strict_check' => in_array('edit-permissions', $permissions, true),
        'types' => array_map('gettype', $permissions)
    ];
    });
    //ballsack
    
    Route::get('/admin/dashboard', [ProfileController::class, 'showAdminDashboard'])->name('admin.dashboard');
    Route::get('/submission/filtersSubs', [SubmissionController::class, 'filtersSubs']);
    Route::get('/submission/filtersHistory', [SubmissionController::class, 'filtersHistory']);
    Route::get('/submission/data', [SubmissionController::class, 'getSubmissionData']);
    Route::get('/submission/history', [SubmissionController::class, 'history']);
    Route::post('/submission/{id}/reject', [SubmissionController::class, 'reject']);
    Route::post('/submission/{id}/approve', [SubmissionController::class, 'approve']);
    Route::post('/inventory/store', [InventoryController::class, 'store'])->name('inventory.store');
    Route::get('/inventory/filtersInv', [InventoryController::class, 'FiltersInv']);
    Route::get('/inventory/data', [InventoryController::class, 'getInventoryData']);
    Route::post('/inventory/import-excel', function (Request $request) {
        $request->validate(['file' => 'required|file|mimes:xlsx']);

        try {
            Excel::import(new InventoryImport(), $request->file('file'));
            return response()->json(['message' => 'Import completed']);
        } catch (ValidationException $e) {
            // Collect all validation errors
            $failures = $e->failures();
            $messages = [];

            foreach ($failures as $failure) {
                // Row number (1-based) and attribute error
                $messages[] = "Row {$failure->row()}: {$failure->attribute()} - {$failure->errors()[0]}";
            }

            return response()->json(
                [
                    'message' => 'Import failed',
                    'errors' => $messages,
                ],
                422,
            );
        } catch (\Throwable $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    });
    Route::get('/admin/inventory/export-docx', [InventoryController::class, 'exportInventoriesDocx'])->name('inventory.export.docx');
    Route::get('/inventory/export/excel', [InventoryExportController::class, 'excel'])->name('inventory.export.excel');
    Route::get('/admin/inventory/export-pdf', [InventoryController::class, 'exportInventoriesPdf'])->name('inventory.export.pdf');
    Route::get('/users/data', [UserAccountsController::class, 'getAllUsers']);
    Route::post('/admin/users/create', [UserAccountsController::class, 'store'])->middleware(['auth', 'verified']);
    Route::prefix('admin')->group(function () {
        Route::get('backup/download', [BackupController::class, 'download'])->name('admin.backup.download');
        Route::post('backup/restore', [BackupController::class, 'restore'])->name('admin.backup.restore');
        Route::post('backup/reset', [BackupController::class, 'backupAndReset'])->name('admin.backup.reset');
    });

    // User-side routes
    Route::get('/user/dashboard', [ProfileController::class, 'showUserDashboard'])->name('user.dashboard');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/deactivate', [ProfileController::class, 'deactivate_account'])->name('account.deactivate');
    Route::get('/submissions/pending', [SubmissionController::class, 'pending'])->name('submissions.pending');
    Route::get('/submissions/history', [SubmissionController::class, 'show_submission_history'])->name('submissions.history');
    Route::post('/submit-thesis', [SubmissionController::class, 'submitThesis'])->name('thesis.submit');
    Route::get('/submissions/{submission}/download', [SubmissionController::class, 'download'])->name('submissions.download');
    Route::put('/password/update', [PasswordController::class, 'update_password'])->name('password.update');

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

//======================================================================================================================================
Route::get('/check', [CheckController::class, 'showRegistrationForm'])->name('check');

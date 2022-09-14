<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\Account\SuperAdminController;
use App\Http\Controllers\Account\AdminController;
use App\Http\Controllers\Account\JurorController;
use App\Http\Controllers\Account\ParticipantController;

/*
|--------------------------------------------------------------------------
| Landing Page
|--------------------------------------------------------------------------
| -
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('landing-page.index');
})->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Manage Authentication
|--------------------------------------------------------------------------
| - Login
| - Participant registration
| - Forgot password
| - Reset password
| - Verify email
| - Remember me
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});

/*
|--------------------------------------------------------------------------
| Manage Account
|--------------------------------------------------------------------------
| - Dashboard
| - Profile
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])-> name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/account')->group(function () {
        Route::get('/superadmin-profile', [SuperAdminController::class, 'profile'])
                    ->name('superadmin.profile');

        Route::get('/admin-profile', [AdminController::class, 'profile'])
                    ->name('admin.profile');

        Route::get('/juror-profile', [JurorController::class, 'profile'])
                    ->name('juror.profile');

        Route::get('/participant-profile', [ParticipantController::class, 'profile'])
                    ->name('participant.profile');

        Route::get('/users-index', [UserController::class, 'index'])
                    ->name('users.index');

        Route::get('/superadmin-list', [SuperAdminController::class, 'list'])
                    ->name('superadmin.list');

        Route::get('/superadmin-grid', [SuperAdminController::class, 'grid'])
                    ->name('superadmin.grid');

        Route::get('/admin-list', [AdminController::class, 'list'])
                    ->name('admin.list');

        Route::get('/admin-grid', [AdminController::class, 'grid'])
        ->name('admin.grid');

        Route::get('/juror-list', [JurorController::class, 'list'])
                    ->name('juror.list');

        Route::get('/juror-grid', [JurorController::class, 'grid'])
                    ->name('juror.grid');

        Route::get('/participant-list-all', [ParticipantController::class, 'listAll'])
                    ->name('participant.list.all');

        Route::get('/participant-list-internal', [ParticipantController::class, 'listInternal'])
                    ->name('participant.list.internal');

        Route::get('/participant-list-external', [ParticipantController::class, 'listExternal'])
                    ->name('participant.list.external');

        Route::get('/participant-grid-all', [ParticipantController::class, 'gridAll'])
                    ->name('participant.grid.all');

        Route::get('/participant-grid-internal', [ParticipantController::class, 'gridInternal'])
                    ->name('participant.grid.internal');

        Route::get('/participant-grid-external', [ParticipantController::class, 'gridExternal'])
                    ->name('participant.grid.external');

        Route::get('/participant-show', [ParticipantController::class, 'show'])
                    ->name('participant.show');

        Route::get('/participant-list-search', [ParticipantController::class, 'searchList'])
                    ->name('participant.list.search');

        Route::get('/participant-grid-search', [ParticipantController::class, 'searchGrid'])
                    ->name('participant.grid.search');
    });    
});
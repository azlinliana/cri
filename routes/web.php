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
use App\Http\Controllers\Account\TitleController;
use App\Http\Controllers\Account\UserController;
use App\Http\Controllers\Account\SuperAdminController;
use App\Http\Controllers\Account\AdminController;
use App\Http\Controllers\Account\JurorController;
use App\Http\Controllers\Account\ParticipantController;
use App\Http\Controllers\Entry\EntryController;
use App\Http\Controllers\Entry\ClusterController;

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
        Route::get('/superadmin-title-user-list', [TitleController::class, 'list'])
        ->name('superadmin.title-user.list');

        Route::post('/superadmin-title-user-list/{titleUser}', [TitleController::class, 'destroy'])
                ->name('superadmin.title-user.list.destroy');

        Route::post('/superadmin-title-user-list', [TitleController::class, 'store']);

        Route::get('/superadmin-title-user-edit/{titleUser}', [TitleController::class, 'edit'])
                ->name('superadmin.title-user.edit');

        Route::put('/superadmin-title-user-update/{titleUser}', [TitleController::class, 'update'])
                ->name('superadmin.title-user.update');

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

        Route::get('/admin-search-list', [AdminController::class, 'searchList'])
                    ->name('admin.search.list');

        Route::get('/admin-search-grid', [AdminController::class, 'searchGrid'])
                    ->name('admin.search.grid');

        Route::get('/admin-create', [AdminController::class, 'create'])
                    ->name('admin.create');

        Route::post('/admin-create', [AdminController::class, 'store']);
                    
        Route::get('/admin-show/{admin}', [AdminController::class, 'show'])
                    ->name('admin.show');

        Route::get('/juror-list-all', [JurorController::class, 'listAll'])
                    ->name('juror.list.all');

        Route::get('/juror-list-pending', [JurorController::class, 'listPending'])
                    ->name('juror.list.pending');

        Route::get('/juror-list-approved', [JurorController::class, 'listApproved'])
                    ->name('juror.list.approved');

        Route::get('/juror-list-rejected', [JurorController::class, 'listRejected'])
                    ->name('juror.list.rejected');

        Route::get('/juror-grid-all', [JurorController::class, 'gridAll'])
                    ->name('juror.grid.all');
                    
        Route::get('/juror-grid-pending', [JurorController::class, 'gridPending'])
                    ->name('juror.grid.pending');

        Route::get('/juror-grid-approved', [JurorController::class, 'gridApproved'])
                    ->name('juror.grid.approved');

        Route::get('/juror-grid-rejected', [JurorController::class, 'gridRejected'])
                    ->name('juror.grid.rejected');

        Route::get('/juror-show/{juror}', [JurorController::class, 'show'])
                    ->name('juror.show');

        Route::get('/juror-edit/{juror}', [JurorController::class, 'edit'])
                    ->name('juror.edit');

        Route::put('/juror-update/{juror}', [JurorController::class, 'update'])
                    ->name('juror.update');

        Route::get('/juror-list-search', [JurorController::class, 'searchList'])
                    ->name('juror.list.search');

        Route::get('/juror-grid-search', [JurorController::class, 'searchGrid'])
                    ->name('juror.grid.search');

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

        Route::get('/participant-show/{participant}', [ParticipantController::class, 'show'])
                    ->name('participant.show');

        Route::get('/participant-list-search', [ParticipantController::class, 'searchList'])
                    ->name('participant.list.search');

        Route::get('/participant-grid-search', [ParticipantController::class, 'searchGrid'])
                    ->name('participant.grid.search');
    });    
});

Route::middleware('guest')->group(function () {
    Route::get('/juror-register', [JurorController::class, 'register'])
        ->name('juror.register');

    Route::post('/juror-register', [JurorController::class, 'store']);
});

/*
|--------------------------------------------------------------------------
| Manage Project Entry
|--------------------------------------------------------------------------
| - Index
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::prefix('/entry')->group(function () {
        Route::get('/superadmin-index', [EntryController::class, 'index'])
                    ->name('superadmin.entryindex');

        Route::get('/superadmin-cluster-list', [ClusterController::class, 'list'])
                    ->name('superadmin.cluster.list');

        Route::post('/superadmin-cluster-list/{cluster}', [ClusterController::class, 'destroy'])
                    ->name('superadmin.cluster.list.destroy');

        Route::post('/superadmin-cluster-list', [ClusterController::class, 'store']);

        Route::get('/superadmin-cluster-edit/{cluster}', [ClusterController::class, 'edit'])
                    ->name('superadmin.cluster.edit');

        Route::put('/superadmin-cluster-update/{cluster}', [ClusterController::class, 'update'])
                    ->name('superadmin.cluster.update');
    });    
});
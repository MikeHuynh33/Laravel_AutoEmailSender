<?php

use App\Http\Controllers\AdminAuth\AuthenticatedSessionController;
use App\Http\Controllers\AdminAuth\ConfirmablePasswordController;
use App\Http\Controllers\AdminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\AdminAuth\EmailVerificationPromptController;
use App\Http\Controllers\AdminAuth\NewPasswordController;
use App\Http\Controllers\AdminAuth\PasswordController;
use App\Http\Controllers\AdminAuth\PasswordResetLinkController;
use App\Http\Controllers\AdminAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

// gruops guest under WHO ARE not authenticated as ADMIN , they are restricted, only be able to do these tasks
Route::middleware('guest:admin')->group(function () {
    Route::get('admin/login', [
        AuthenticatedSessionController::class,
        'create',
    ])->name('admin.login');

    Route::post('admin/login', [
        AuthenticatedSessionController::class,
        'store',
    ]);

    Route::get('admin/forgot-password', [
        PasswordResetLinkController::class,
        'create',
    ])->name('admin.password.request');

    Route::post('admin/forgot-password', [
        PasswordResetLinkController::class,
        'store',
    ])->name('admin.password.email');

    Route::get('admin/reset-password/{token}', [
        NewPasswordController::class,
        'create',
    ])->name('admin.password.reset');

    Route::post('admin/reset-password', [
        NewPasswordController::class,
        'store',
    ])->name('admin.password.store');
});
// gruops under WHO ARE authenticated as ADMIN, they are allowed to do these tasks,
Route::middleware('auth.admin:admin')->group(function () {
    Route::get(
        'admin/verify-email',
        EmailVerificationPromptController::class
    )->name('admin.verification.notice');

    Route::get('admin/verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('admin.verification.verify');

    Route::post('email/verification-notification', [
        EmailVerificationNotificationController::class,
        'store',
    ])
        ->middleware('throttle:6,1')
        ->name('admin.verification.send');

    Route::get('admin/confirm-password', [
        ConfirmablePasswordController::class,
        'show',
    ])->name('admin.password.confirm');

    Route::post('admin/admin.confirm-password', [
        ConfirmablePasswordController::class,
        'store',
    ]);

    Route::put('admin/password', [PasswordController::class, 'update'])->name(
        'admin.password.update'
    );

    Route::post('admin/logout', [
        AuthenticatedSessionController::class,
        'destroy',
    ])->name('admin.logout');
});
<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');



Route::get('/login/{provider}', [AuthenticatedSessionController::class, 'redirect'])
                ->middleware('guest')
                ->name('githublogin');

Route::get('/login/{provider}/callback', [AuthenticatedSessionController::class, 'Callback'])
                ->middleware('guest')
                ->name('githubcallback');


                //github
/*Route::get('/login/github', [AuthenticatedSessionController::class, 'redirectToGithub'])
                ->middleware('guest')
                ->name('githublogin');

Route::get('/login/github/callback', [AuthenticatedSessionController::class, 'githubCallback'])
                ->middleware('guest')
                ->name('githubcallback');

                //facebook
Route::get('/login/facebook', [AuthenticatedSessionController::class, 'redirectToFacebook'])
                ->middleware('guest')
                ->name('facebooklogin');

Route::get('/login/facebook/callback', [AuthenticatedSessionController::class, 'facebookCallback'])
                ->middleware('guest')
                ->name('facebookcallback');

                //google
Route::get('/login/google', [AuthenticatedSessionController::class, 'redirectToGoogle'])
                ->middleware('guest')
                ->name('googlelogin');

Route::get('/login/google/callback', [AuthenticatedSessionController::class, 'googleCallback'])
                ->middleware('guest')
                ->name('googlecallback');*/


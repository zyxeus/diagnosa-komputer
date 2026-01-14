<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\KerusakanController;
use App\Http\Controllers\Admin\SolusiController;
use App\Http\Controllers\Admin\ProsesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;

// Login Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'LoginForm'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');

    // Lupa Password
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
        ->name('admin.password.request');

    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
        ->name('admin.password.email');

    Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
        ->name('admin.password.reset');

    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])
        ->name('admin.password.update');

    // Dashboard Admin
    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::put('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('admin.profile.password');
        Route::resource('/gejala', GejalaController::class)->names('admin.gejala');
        Route::resource('/kerusakan', KerusakanController::class)->names('admin.kerusakan');
        Route::resource('/solusi', SolusiController::class)->names('admin.solusi');
        Route::resource('/proses', ProsesController::class, ['parameters' => ['proses' => 'proses']])->names('admin.proses');
        Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
        Route::delete('/user/{user_id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('/riwayat', [RiwayatController::class, 'index'])->name('admin.riwayat.index');
        Route::delete('/riwayat/{riwayat}', [RiwayatController::class, 'destroy'])->name('admin.riwayat.destroy');
        Route::get('testimoni', [TestimoniController::class, 'index'])->name('admin.testimoni.index');
        Route::delete('/testimoni/{testimoni}', [TestimoniController::class, 'destroy'])->name('admin.testimoni.destroy');
        Route::patch('/testimoni/{testimoni}/toggle', [TestimoniController::class, 'toggle'])->name('admin.testimoni.toggle');
    });
});
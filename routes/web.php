<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\Auth\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\User\ProfileController;
use App\Http\Controllers\User\TestimoniController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\User\ForgotPasswordController;
use App\Http\Controllers\User\ResetPasswordController;
use App\Http\Controllers\User\NewPasswordController;
use App\Http\Controllers\User\PasswordResetLinkController;

//USER AUTH
Route::prefix('user')->group(function () {

    // Form
    Route::get('/login', [AuthController::class, 'showLogin'])->name('user.login.form');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('user.register.form');

    // Action
    Route::post('/login', [AuthController::class, 'login'])->name('user.login');
    Route::post('/register', [AuthController::class, 'register'])->name('user.register');
    Route::post('/logout', [AuthController::class, 'logout'])->name('user.logout');

});

// Halaman Publik
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/information', [HomeController::class, 'information'])->name('information');
Route::post('/feedback', [FeedbackController::class, 'store'])->name('feedback.store');

// Diagnosis
Route::get('/diagnosis', [DiagnosisController::class, 'index'])->name('diagnosis.index');

Route::middleware(['auth'])->group(function () {
    Route::post('/diagnosis/process', [DiagnosisController::class, 'process'])->name('diagnosis.process');
    Route::get('/diagnosis/result',   [DiagnosisController::class, 'result'])->name('diagnosis.result');
    Route::get('/diagnosis/result/{riwayat_id}', [DiagnosisController::class, 'result'])
    ->name('diagnosis.result');

    Route::get('/diagnosis/result/{riwayat_id}/pdf', [DiagnosisController::class, 'generatePdf'])
    ->name('diagnosis.result.pdf');
});

// Profile & Testimoni (harus login)
Route::middleware(['auth'])->prefix('user')->name('user.')->group(function () {
    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password');
    Route::get('/riwayat/download/{riwayat_id}', [ProfileController::class, 'downloadPdf'])->name('riwayat.download');

    // Testimoni
    Route::post('/testimoni', [TestimoniController::class, 'store'])->name('testimoni.store');
    Route::put('/testimoni/{id}', [TestimoniController::class, 'update'])->name('testimoni.update');
    Route::delete('/testimoni/{id}', [TestimoniController::class, 'destroy'])->name('testimoni.destroy');
});

//lupa password
Route::get('/user/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('user.password.request');

Route::post('/user/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('user.password.email');

Route::get('/user/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('user.password.reset');

Route::post('/user/reset-password', [ResetPasswordController::class, 'reset'])
    ->name('user.password.update');

//link lupa password
// ===== RESET PASSWORD USER =====
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->name('password.update');

Route::get('/cek-gd', function () {
    phpinfo();
});

require __DIR__.'/admin.php';

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        return view('user.auth.reset-password', compact('token'));
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => [
                'required',
                'confirmed',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]{6,12}$/'
            ],
        ], [
            'password.required' =>
                'Password wajib diisi.',
            'password.confirmed' =>
                'Konfirmasi password tidak sama.',
            'password.regex' =>
                'Password harus 6–12 karakter, kombinasi huruf dan angka, tanpa spasi atau simbol.',
        ]);

        $status = Password::broker('users')->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = Hash::make($password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('user.login.form')->with('success', 'Password berhasil diubah, silakan login.')
            : back()->withErrors(['email' => 'Token tidak valid atau expired.']);
    }
}



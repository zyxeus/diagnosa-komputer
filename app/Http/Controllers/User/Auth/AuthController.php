<?php

namespace App\Http\Controllers\user\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLogin()
    {
        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || $user->role !== 'user') {
            return back()->withErrors([
                'login' => 'Akun ini tidak terdaftar sebagai User.'
            ])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'login' => 'Email atau password salah.'
            ])->withInput();
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    // Tampilkan form register
    public function showRegister()
    {
        return view('user.auth.register');
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'name' => [
                'required',
                'regex:/^[A-Za-z ]+$/'
            ],
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'min:6',
                'max:8',
                'regex:/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9]+$/'
            ],
        ], [
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 6 karakter.',
            'password.max' => 'Password maksimal 8 karakter.',
            'password.regex' => 'Password harus mengandung huruf dan angka dan tidak boleh mengandung spasi atau simbol.',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
            'status_aktif' => true,
        ]);

        return redirect()->route('user.login.form')
                ->with('success', 'Registrasi berhasil. Silakan login.');;
    }

    // Logout user
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

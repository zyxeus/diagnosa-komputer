<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.edit', compact('admin'));
    }

    public function update(Request $request)
    {
        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();

        $request->validate([
            'name' => [
                'required',
                'regex:/^[A-Za-z ]+$/',
                'max:100',
            ],
            'email' => 'required|email|unique:admins,email,' . $admin->id . ',id',
        ], [
            'name.regex' => 'Nama hanya boleh berisi huruf dan spasi, tanpa angka atau simbol.',
        ]);

        $admin->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return back()->with('success', 'Profil admin berhasil diperbarui.');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => [
                'required',
                'confirmed',
                'regex:/^[A-Za-z0-9]{6,12}$/'
            ],
        ], [
            'password.regex' =>
                'Password harus 6–12 karakter, mengandung huruf dan angka, tanpa spasi atau simbol.',
        ]);

        /** @var \App\Models\Admin $admin */
        $admin = Auth::guard('admin')->user();

        if (!Hash::check($request->current_password, $admin->password)) {
            return back()
                ->withErrors(['current_password' => 'Password lama salah.'])
                ->withInput();
        }

        $admin->update([
            'password' => Hash::make($request->password),
        ]);

        return back()->with('success', 'Password admin berhasil diperbarui.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->get();
        return view('admin.user.index', compact('users'));
    }

     public function destroy($user_id)
    {
        $user = User::findOrFail($user_id);
        $user->delete(); 
        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil dihapus');
    }
}

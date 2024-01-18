<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function home()
    {
        return redirect('/login');
    }
    public function index()
    {
        return view('auth.login');
    }
    public function proseslogin(Request $request)
    {
        if (Auth::guard('siswa')->attempt(['nis' => $request->nis, 'password' => $request->password])) {
            return redirect('/siswa/dashboard');
        } else {
            return redirect('/login')->with('warning', 'NIS / Password Salah!');
        }
    }
    public function logout()
    {
        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
            return redirect('/login');
        }
    }
}

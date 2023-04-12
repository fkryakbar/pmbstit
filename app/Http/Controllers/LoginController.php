<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 'mahasiswa') {
                return redirect()->intended('pendaftaran');
            } else if (Auth::user()->role == 'admin') {
                return redirect()->intended('admin');
            }
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required'],
            'password' => ['required']
        ], [
            'email.required' => 'Email atau No.HP/WA wajib diisi',
            'password.required' => 'Password wajib diisi'
        ]);

        if (Auth::attempt($credentials, true)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('admin');
            }
            return redirect()->intended('pendaftaran');
        }
        return back()->withErrors(['email' => 'Akun belum terdaftar atau password salah']);
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/masuk');
    }
}

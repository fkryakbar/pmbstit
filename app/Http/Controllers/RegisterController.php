<?php

namespace App\Http\Controllers;

use App\Models\SettingsModel;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {

        return view('auth.register', [
            'settings' => SettingsModel::all()[0]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'unique:users'],
            'password' => ['required', 'min:3', 'confirmed'],
        ], [
            'name.required' => 'Nama perlu diisi',
            'name.max' => 'Nama maksimal 50 karakter',
            'email.required' => 'Email atau No.HP/WA perlu diisi',
            'email.unique' => 'Email atau No.HP/WA sudah digunakan, silahkan gunakan email atau No.HP/WA yang lain',
            'password.required' => 'Password perlu diisi',
            'password.min' => 'Password minimal 3 karakter',
            'password.confirmed' => 'konfirmasi password belum sesuai'
        ]);
        $request->merge(['password' => bcrypt($request->password)]);
        $request->mergeIfMissing(['role' => 'mahasiswa']);

        User::create($request->except(['_token', 'password_confirmation']));
        return redirect()->to('/daftar')->with('message', 'Akun berhasil dibuat, silahkan login');
    }
}

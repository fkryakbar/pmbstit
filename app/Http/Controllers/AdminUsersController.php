<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminUsersController extends Controller
{
    public function index($id = null)
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        if ($id) {
            $user = User::where('id', $id)->firstOrFail();
            return view('admin.users_edit', [
                'user' => $user
            ]);
        }
        $users = User::all()->except([1]);
        return view('admin.users', [
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'role' => 'required'
        ]);
        if ($request->password) {
            $request->merge(['password' => bcrypt($request->password)]);
            User::where('id', $id)->update($request->except(['_token']));
            return redirect('/admin/users')->with('message', 'Akun berhasil disimpan');
        }
        User::where('id', $id)->update($request->except(['_token', 'password']));
        return redirect('/admin/users')->with('message', 'Akun berhasil disimpan');
    }

    public function delete($id)
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        User::where('id', $id)->delete();
        return redirect('/admin/users')->with('message', 'Akun berhasil dihapus');
    }
}

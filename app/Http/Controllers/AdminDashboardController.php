<?php

namespace App\Http\Controllers;

use App\Models\FormModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $users = User::all()->except([1]);
            $forms = FormModel::all();
            return view('admin.dashboard', [
                'users' => $users,
                'forms' => $forms
            ]);
        }
        abort(404);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SettingsModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminSettingsController extends Controller
{
    public function index()
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        return view('admin.settings', [
            'settings' => SettingsModel::all()->first()
        ]);
    }

    public function update(Request $request)
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }

        $request->validate([
            'title' => ['required'],
            'batch' => ['required'],
            'file' => 'mimes:jpeg,jpg,png,gif|max:500',
            'whatsapp_group' => 'max:50',
            'contact_person_1' => 'required',
            'contact_person_2' => 'required',
            'contact_person_3' => 'required',
            'contact_person_3' => 'required',
            'allow_to_edit' => 'required',
            'open_registration' => 'required',
        ]);

        if ($request->file('file')) {
            $path = $request->file('file')->storeAs('assets/upload', 'brosur' . '.' . $request->file('file')->getClientOriginalExtension());
            $request->mergeIfMissing(['brochure' =>  $path]);
        }
        SettingsModel::all()->first()->update($request->except(['_token', 'file']));
        return redirect('/admin/settings')->with('message', 'Pengaturan berhasil disimpan');
    }
}

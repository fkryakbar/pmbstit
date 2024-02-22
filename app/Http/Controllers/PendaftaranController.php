<?php

namespace App\Http\Controllers;

use App\Models\FormModel;
use App\Models\SettingsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    public function index()
    {
        $data = FormModel::where('user_id', Auth::user()->id)->get();
        if (count($data) > 0) {
            return view('dashboard.pmb', [
                'data' => $data[0],
                'settings' => SettingsModel::all()[0]
            ]);
        }
        return view('dashboard.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'study_program' => ['required'],
            'full_name' => ['required', 'max:50'],
            'place_of_birth' => ['required', 'max:30'],
            'date_of_birth' => ['required', 'max:30'],
            'nisn' => ['required', 'numeric'],
            'gender' => ['required', 'max:30'],
            'id_number' => ['required', 'max:50'],
            'graduate_from' => ['required', 'max:30'],
            'highschool_program' => ['required', 'max:30'],
            'year_of_graduate' => ['required', 'max:30'],
            'address' => ['required', 'max:500'],
            'phone_number' => ['required', 'numeric'],
        ], [
            'study_program.required' => 'Program studi wajib diisi',
            'full_name.required' => 'Nama Lengkap wajib diisi',
            'place_of_birth.required' => 'Tempat lahir wajib diisi',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi',
            'nisn.required' => 'NISN wajib diisi',
            'nisn.numeric' => 'NISN harus berupa angka',
            'gender.required' => 'Jenis kelamin wajib diisi',
            'id_number.required' => 'No identitas wajib diisi',
            'graduate_from.required' => 'Asal Sekolah wajib diisi',
            'highschool_program.required' => 'Jurusan Asal wajib diisi',
            'year_of_graduate.required' => 'Tahun lulus wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'phone_number.required' => 'No HP/WA wajib diisi',
            'phone_number.numeric' => 'No HP/WA harus berupa Angka',
        ]);
        $request->mergeIfMissing(['user_id' => Auth::user()->id, 'registration_id' => time(), 'registration_status' => 'seleksi']);

        $input = FormModel::create($request->except(['_token']));
        $registration_id = 'PMB' . date('y') . SettingsModel::all()->first()->batch . sprintf("%03s", $input->id);
        $input->update(['registration_id' => $registration_id]);

        return redirect()->to('/pendaftaran')->with('message', 'Formulir berhasil disubmit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'study_program' => ['required'],
            'full_name' => ['required', 'max:50'],
            'place_of_birth' => ['required', 'max:30'],
            'date_of_birth' => ['required', 'max:30'],
            'nisn' => ['required', 'numeric'],
            'gender' => ['required', 'max:30'],
            'id_number' => ['required', 'max:50'],
            'graduate_from' => ['required', 'max:30'],
            'highschool_program' => ['required', 'max:30'],
            'year_of_graduate' => ['required', 'max:30'],
            'address' => ['required', 'max:500'],
            'phone_number' => ['required', 'numeric'],
        ], [
            'study_program.required' => 'Program studi wajib diisi',
            'full_name.required' => 'Nama Lengkap wajib diisi',
            'place_of_birth.required' => 'Tempat lahir wajib diisi',
            'date_of_birth.required' => 'Tanggal lahir wajib diisi',
            'gender.required' => 'Jenis kelamin wajib diisi',
            'id_number.required' => 'No identitas wajib diisi',
            'graduate_from.required' => 'Asal Sekolah wajib diisi',
            'highschool_program.required' => 'Jurusan Asal wajib diisi',
            'year_of_graduate.required' => 'Tahun lulus wajib diisi',
            'address.required' => 'Alamat wajib diisi',
            'phone_number.required' => 'No HP/WA wajib diisi',
            'phone_number.numeric' => 'No HP/WA harus berupa Angka',
        ]);

        $data = FormModel::where('user_id', Auth::user()->id);
        $data->update($request->except(['_token']));
        return redirect()->to('/pendaftaran')->with('message', 'Formulir berhasil disimpan');
    }


    public function print($registration_id)
    {
        $date =  Carbon::today()->translatedFormat('d F Y');
        if (Auth::user()->role == 'admin') {
            $data = FormModel::where('registration_id', $registration_id)->firstOrFail();
            $pdf = Pdf::loadView('print.print', ['data' => $data, 'date' => $date]);
            return $pdf->stream($data->full_name . '.pdf');
        }
        $reg_id_from_user = FormModel::where('user_id', Auth::user()->id)->firstOrFail();
        if ($reg_id_from_user->registration_id == $registration_id) {
            $data = FormModel::where('registration_id', $registration_id)->firstOrFail();
            $pdf = Pdf::loadView('print.print', ['data' => $data, 'date' => $date]);
            return $pdf->stream($data->full_name . '.pdf');
        }
        abort(404);
    }
}

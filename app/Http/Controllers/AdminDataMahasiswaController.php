<?php

namespace App\Http\Controllers;

use App\Exports\CalonMahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\FormModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AdminDataMahasiswaController extends Controller
{
    public function index($registration_id = null)
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        if ($registration_id != null) {
            $form = FormModel::where('registration_id', $registration_id)->firstOrFail();
            return view('admin.data_edit', [
                'data' => $form
            ]);
        }
        $forms = FormModel::all();
        return view('admin.data', [
            'forms' => $forms
        ]);
    }


    public function delete($registration_id)
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        $form = FormModel::where('registration_id', $registration_id)->firstOrFail();
        $form->delete();

        return redirect('/admin/data-mahasiswa')->with('message', 'Data Berhasil dihapus');
    }

    public function update($registration_id, Request $request)
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        $request->validate([
            'study_program' => ['required'],
            'full_name' => ['required', 'max:30'],
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

        $data = FormModel::where('registration_id', $registration_id);
        $data->update($request->except(['_token']));
        return redirect()->to('/admin/data-mahasiswa')->with('message', 'Formulir berhasil disimpan');
    }


    public function exportExcel()
    {
        if (Auth::user()->role != 'admin') {
            abort(404);
        }
        return Excel::download(new CalonMahasiswaExport, 'data.xlsx');
    }
}

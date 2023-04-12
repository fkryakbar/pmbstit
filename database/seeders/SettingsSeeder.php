<?php

namespace Database\Seeders;

use App\Models\SettingsModel;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SettingsModel::create([
            'title' => 'PENERIMAAN MAHASISWA BARU STIT ASUNNIYYAH TAMBARANGAN',
            'batch' => '1',
            'brochure' => '/assets/static/image/brosur 1.jpg',
            'contact_person_1' => 'Tri Dina Kartina Sari, S.Pd (+62 852 5160 0053)',
            'contact_person_2' => 'Fathurrahman (+62 852 5160 0053)',
            'contact_person_3' => 'Dina Aulia (+62 852 5160 0053)',
            'allow_to_edit' => true,
            'show_registration_result' => true,
            'open_registration' => true,

        ]);
    }
}

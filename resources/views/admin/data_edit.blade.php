<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.landing_head')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Edit Data Calon Mahasiswa</title>
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body x-cloak x-data="{ sidebar_open: false }">
    <section class="h-screen">
        <div class="flex flex-row gap-5 relative">
            @include('partials.admin_sidemenu')
            <div class="lg:basis-5/6 basis-[100%] p-3 ">
                @include('partials.admin_navbar')
                <div class="w-full shadow-lg p-5 mt-4 rounded-lg max-w-sm  lg:max-w-full overflow-x-auto ">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-green-500">Data Calon Mahasiswa</h1>
                        <a href="/pendaftaran/cetak/{{ $data->registration_id }}"
                            class="btn btn-sm bg-blue-500 hover:bg-blue-700 border-none flex gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                            </svg>

                            Cetak</a>
                    </div>
                    <hr class="my-3">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-error mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $error }}</span>
                            </div>
                        @endforeach
                    @endif
                    <form action="" method="POST">
                        @csrf
                        <h1 class="my-3 font-bold text-green-500">ID Registrasi : {{ $data->registration_id }}</h1>
                        <h1 class="font-bold text-green-500">Informasi Kelulusan</h1>
                        <div class="form-control w-full mb-3">
                            <label class="label">
                                <span class="label-text">Status Kelulusan</span>
                            </label>
                            <select class="select select-bordered w-full" name="registration_status">
                                <option value="seleksi" @if ($data->registration_status == 'seleksi') selected @endif>Seleksi
                                </option>
                                <option value="lulus" @if ($data->registration_status == 'lulus') selected @endif>Lulus</option>
                                <option value="tidak lulus" @if ($data->registration_status == 'tidak lulus') selected @endif>Tidak
                                    Lulus</option>
                            </select>
                        </div>
                        <h1 class="font-bold text-green-500">Informasi Program Studi</h1>

                        <div class="form-control w-full mb-3">
                            <label class="label">
                                <span class="label-text">Pilihan Program Studi</span>
                            </label>
                            <select class="select select-bordered w-full" name="study_program">
                                <option disabled @if (!old('study_program')) selected @endif>Pilih Program Studi
                                </option>
                                <option value="S1 - Pendidikan Agama Islam"
                                    @if ($data->study_program == 'S1 - Pendidikan Agama Islam') selected @endif>S1
                                    - Pendidikan Agama Islam</option>
                                <option value="S1 - Pendidikan Bahasa Arab"
                                    @if ($data->study_program == 'S1 - Pendidikan Bahasa Arab') selected @endif>S1
                                    - Pendidikan Bahasa Arab</option>
                            </select>
                        </div>
                        <h1 class="font-bold text-green-500">Data Calon Mahasiswa</h1>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Nama Lengkap</span>
                            </label>
                            <input type="text" name="full_name" placeholder="Masukkan disini"
                                class="input input-bordered w-full" value="{{ $data->full_name }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Tempat Lahir</span>
                            </label>
                            <input type="text" name="place_of_birth" placeholder="Masukkan disini"
                                class="input input-bordered w-full" value="{{ $data->place_of_birth }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Tanggal Lahir</span>
                            </label>
                            <input type="date" name="date_of_birth" placeholder="Masukkan disini"
                                class="input input-bordered w-full" value="{{ $data->date_of_birth }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">NISN</span>
                            </label>
                            <input type="text" name="nisn" placeholder="Masukkan disini"
                                class="input input-bordered w-full" value="{{ $data->nisn }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Jenis Kelamin</span>
                            </label>
                            <select class="select select-bordered w-full" name="gender">
                                <option disabled @if (!old('gender')) selected @endif>Pilih Jenis Kelamin
                                </option>
                                <option value="Laki-laki" @if ($data->gender == 'Laki-laki') selected @endif>
                                    Laki-laki</option>
                                <option value="Perempuan" @if ($data->gender == 'Perempuan') selected @endif>
                                    Perempuan</option>
                            </select>
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">No. NIK/KTP/SIM</span>
                            </label>
                            <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                                name="id_number" value="{{ $data->id_number }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Asal SMA/SMK/MA</span>
                            </label>
                            <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                                name="graduate_from" value="{{ $data->graduate_from }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Program/Jurusan SMA/SMK/MA</span>
                            </label>
                            <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                                name="highschool_program" value="{{ $data->highschool_program }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Tahun Lulus</span>
                            </label>
                            <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                                name="year_of_graduate" value="{{ $data->year_of_graduate }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Alamat Sekarang</span>
                            </label>
                            <textarea class="textarea textarea-bordered" placeholder="Masukkan disini" name="address">{{ $data->address }}</textarea>
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">No. HP/WA</span>
                            </label>
                            <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                                name="phone_number" value="{{ $data->phone_number }}" />
                        </div>
                        <button
                            class="btn mt-3 bg-green-500 border-0 hover:bg-green-700 w-full lg:w-[200px] text-white">SIMPAN
                            FORMULIR</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

</body>

</html>

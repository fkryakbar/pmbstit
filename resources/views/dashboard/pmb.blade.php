<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.landing_head')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Dashboard</title>
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body x-cloak x-data="{ sidebar_open: false, open: false, disabled: true }" class="bg-slate-100">
    @include('partials.dashboard_sidemenu')
    @include('partials.dashboard_navbar')
    <section class="lg:w-[50%] lg:mx-auto mx-3 my-10 " :class="open == false ? 'lg:h-screen' : ''">
        <div class="rounded-xl shadow-lg mb-5  p-5 bg-white">
            <h1 class="text-2xl font-bold text-green-500">Pendaftaran</h1>
        </div>
        <div class="card card-compact bg-base-100 shadow-lg">
            <figure class="lg:h-[150px]"><img class="bg-top" src="{{ asset('assets/static/image/kampus.jpg') }}"
                    alt="kampus" />
            </figure>
            <div class="card-body">
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
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                            fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('message') }}</span>
                    </div>
                @endif
                <h2 class="card-title">Penerimaan Mahasiswa Baru
                    @if ($settings->show_registration_result == 1)
                        @if ($data->registration_status == 'seleksi')
                            <div class="badge bg-yellow-400 border-none p-3 uppercase text-white">
                                {{ $data->registration_status }}
                            </div>
                        @endif
                        @if ($data->registration_status == 'lulus')
                            <div class="badge bg-green-400 border-none p-3 uppercase text-white">
                                {{ $data->registration_status }}
                            </div>
                        @endif
                        @if ($data->registration_status == 'tidak lulus')
                            <div class="text-white text-center rounded-xl bg-red-400 border-none p-3 uppercase text-sm">
                                {{ $data->registration_status }}
                            </div>
                        @endif
                    @endif
                </h2>
                <p>Penerimaan Mahasiswa Baru STIT Assunniyyah Tambarangan</p>
                @if ($settings->whatsapp_group)
                    <div x-show="open" class="bg-green-300 p-5 rounded-lg my-2" x-transition>
                        Untuk mempermudah komunikasi dengan calon mahasiswa baru, dipersilahkan calon mahasiswa baru
                        agar
                        dapat memasuki <a href="{{ $settings->whatsapp_group }}" class="link">WhatsApp Group
                            berikut</a>
                    </div>
                @endif
                @if ($settings->information)
                    <div x-show="open" class="bg-yellow-300 p-5 rounded-lg my-2" x-transition>
                        {{ $settings->information }}</a>
                    </div>
                @endif
                <div class="flex justify-between">
                    @if ($settings->allow_to_edit == 1)
                        <button x-show="open" x-transition type="button" x-on:click="disabled= !disabled"
                            class="btn btn-sm bg-blue-400 border-none w-44 hover:bg-blue-600 text-white">Edit
                            Formulir</button>
                    @endif
                    <a x-show="open" x-transitio href="/pendaftaran/cetak/{{ $data->registration_id }}"
                        class="btn btn-sm bg-green-500 hover:bg-green-700 border-none flex gap-2 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M6.72 13.829c-.24.03-.48.062-.72.096m.72-.096a42.415 42.415 0 0110.56 0m-10.56 0L6.34 18m10.94-4.171c.24.03.48.062.72.096m-.72-.096L17.66 18m0 0l.229 2.523a1.125 1.125 0 01-1.12 1.227H7.231c-.662 0-1.18-.568-1.12-1.227L6.34 18m11.318 0h1.091A2.25 2.25 0 0021 15.75V9.456c0-1.081-.768-2.015-1.837-2.175a48.055 48.055 0 00-1.913-.247M6.34 18H5.25A2.25 2.25 0 013 15.75V9.456c0-1.081.768-2.015 1.837-2.175a48.041 48.041 0 011.913-.247m10.5 0a48.536 48.536 0 00-10.5 0m10.5 0V3.375c0-.621-.504-1.125-1.125-1.125h-8.25c-.621 0-1.125.504-1.125 1.125v3.659M18 10.5h.008v.008H18V10.5zm-3 0h.008v.008H15V10.5z" />
                        </svg>
                        Cetak</a>
                </div>
                <form x-show="open" action="/pendaftaran/update" method="POST" x-transition>
                    @csrf
                    @if ($settings->show_registration_result == 1)
                        @if ($data->registration_status == 'lulus')
                            <div class="my-5 bg-green-100 p-8 rounded-lg">
                                <img class="lg:w-[30%] mx-auto"
                                    src="{{ asset('assets/static/image/Personal goals-amico.svg') }}" alt="">
                                <p class="text-center font-bold text-green-500 text-xl ">Selamat Kamu dinyatakan Lolos
                                    dalam
                                    Penerimaan
                                    Mahasiswa Baru
                                    STIT Assunniyyah Tambarangan
                                </p>
                            </div>
                        @endif

                    @endif
                    <h1 class="my-3 font-bold text-green-500">ID Registrasi : {{ $data->registration_id }}</h1>

                    <h1 class="font-bold text-green-500">Informasi Program Studi</h1>

                    <div class="form-control w-full mb-3">
                        <label class="label">
                            <span class="label-text">Pilihan Program Studi</span>
                        </label>
                        <select class="select select-bordered w-full" name="study_program" x-bind:disabled="disabled">
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
                            class="input input-bordered w-full" value="{{ $data->full_name }}"
                            x-bind:disabled="disabled" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Tempat Lahir</span>
                        </label>
                        <input type="text" name="place_of_birth" placeholder="Masukkan disini"
                            class="input input-bordered w-full" value="{{ $data->place_of_birth }}"
                            x-bind:disabled="disabled" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Tanggal Lahir</span>
                        </label>
                        <input type="date" name="date_of_birth" placeholder="Masukkan disini"
                            class="input input-bordered w-full" value="{{ $data->date_of_birth }}"
                            x-bind:disabled="disabled" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">NISN</span>
                        </label>
                        <input type="text" name="nisn" placeholder="Masukkan disini"
                            class="input input-bordered w-full" value="{{ $data->nisn }}"
                            x-bind:disabled="disabled" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Jenis Kelamin</span>
                        </label>
                        <select class="select select-bordered w-full" name="gender" x-bind:disabled="disabled">
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
                            name="id_number" value="{{ $data->id_number }}" x-bind:disabled="disabled" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Asal SMA/SMK/MA</span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="graduate_from" value="{{ $data->graduate_from }}" x-bind:disabled="disabled" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Program/Jurusan SMA/SMK/MA</span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="highschool_program" value="{{ $data->highschool_program }}"
                            x-bind:disabled="disabled" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Tahun Lulus</span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="year_of_graduate" value="{{ $data->year_of_graduate }}"
                            x-bind:disabled="disabled" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Alamat Sekarang</span>
                        </label>
                        <textarea class="textarea textarea-bordered" placeholder="Masukkan disini" name="address"
                            x-bind:disabled="disabled">{{ $data->address }}</textarea>
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">No. HP/WA</span>
                        </label>
                        <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                            name="phone_number" value="{{ $data->phone_number }}" x-bind:disabled="disabled" />
                    </div>
                    <button class="btn mt-3 bg-green-500 border-0 hover:bg-green-700 w-full lg:w-[200px] text-white"
                        :class="disabled ? 'hidden' : ''">SIMPAN
                        FORMULIR</button>
                </form>
                <div class="card-actions justify-end">
                    <button x-on:click="open = !open" :class="open ? 'hidden' : ''"
                        class="btn bg-green-500 border-none hover:bg-green-600 text-white">Buka</button>
                    <button x-on:click="open = !open" :class="open == false ? 'hidden' : ''"
                        class="btn bg-green-500 border-none hover:bg-green-600 text-white">Tutup</button>
                </div>
            </div>
        </div>
    </section>
    <script>
        function print() {
            const element = document.getElementById('formulir');
            html2pdf().from(element).save();
        }
    </script>
    @include('partials.landing_footer')

</body>

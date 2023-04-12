<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.landing_head')
    <title>Formulir Pendaftaran</title>
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body x-cloak x-data="{ sidebar_open: false }">
    @include('partials.dashboard_sidemenu')
    @include('partials.dashboard_navbar')
    <section class="mb-10">
        <div class="lg:w-[50%] lg:mx-auto lg:rounded-lg lg:border-2 lg:shadow-lg mt-10 lg:p-5 p-3">
            <div class="mb-5">
                <div class="text-center font-bold text-green-500 lg:text-4xl text-2xl">Formulir Pendaftaran</div>
                <div class="text-center text-slate-900 text-sm lg:text-lg">Silahkan isi formulir dibawah ini</div>
            </div>
            <form action="" method="POST">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-error mb-3">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ $error }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif
                @csrf
                <h1 class="font-bold text-green-500">Informasi Program Studi</h1>
                <div class="form-control w-full mb-3">
                    <label class="label">
                        <span class="label-text">Pilihan Program Studi</span>
                    </label>
                    <select class="select select-bordered w-full" name="study_program">
                        <option disabled @if (!old('study_program')) selected @endif>Pilih Program Studi</option>
                        <option value="S1 - Pendidikan Agama Islam" @if (old('study_program') == 'S1 - Pendidikan Agama Islam') selected @endif>S1
                            - Pendidikan Agama Islam</option>
                        <option value="S1 - Pendidikan Bahasa Arab" @if (old('study_program') == 'S1 - Pendidikan Bahasa Arab') selected @endif>S1
                            - Pendidikan Bahasa Arab</option>
                    </select>
                </div>
                <h1 class="font-bold text-green-500">Data Calon Mahasiswa</h1>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Nama Lengkap</span>
                    </label>
                    <input type="text" name="full_name" placeholder="Masukkan disini"
                        class="input input-bordered w-full" value="{{ old('full_name') }}" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Tempat Lahir</span>
                    </label>
                    <input type="text" name="place_of_birth" placeholder="Masukkan disini"
                        class="input input-bordered w-full" value="{{ old('place_of_birth') }}" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Tanggal Lahir</span>
                    </label>
                    <input type="date" name="date_of_birth" placeholder="Masukkan disini"
                        class="input input-bordered w-full" value="{{ old('date_of_birth') }}" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">NISN</span>
                    </label>
                    <input type="text" name="nisn" placeholder="Masukkan disini"
                        class="input input-bordered w-full" value="{{ old('nisn') }}" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Jenis Kelamin</span>
                    </label>
                    <select class="select select-bordered w-full" name="gender">
                        <option disabled @if (!old('gender')) selected @endif>Pilih Jenis Kelamin</option>
                        <option value="Laki-laki" @if (old('gender') == 'Laki-laki') selected @endif>
                            Laki-laki</option>
                        <option value="Perempuan" @if (old('gender') == 'Perempuan') selected @endif>
                            Perempuan</option>
                    </select>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">No. NIK/KTP/SIM</span>
                    </label>
                    <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                        name="id_number" value="{{ old('id_number') }}" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Asal SMA/SMK/MA</span>
                    </label>
                    <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                        name="graduate_from" value="{{ old('graduate_from') }}" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Program/Jurusan SMA/SMK/MA</span>
                    </label>
                    <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                        name="highschool_program" value="{{ old('highschool_program') }}" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Tahun Lulus</span>
                    </label>
                    <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                        name="year_of_graduate" value="{{ old('year_of_graduate') }}" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Alamat Sekarang</span>
                    </label>
                    <textarea class="textarea textarea-bordered" placeholder="Masukkan disini" name="address">{{ old('address') }}</textarea>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">No. HP/WA</span>
                    </label>
                    <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                        name="phone_number" value="{{ old('phone_number') }}" />
                </div>
                <button class="btn mt-3 bg-green-500 border-0 hover:bg-green-700 w-full lg:w-[200px]">SUBMIT
                    FORMULIR</button>
            </form>
        </div>
    </section>
    @include('partials.landing_footer')

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.landing_head')
    <title>Pengaturan</title>
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body x-cloak x-data="{ sidebar_open: false }">
    <section class="h-screen">
        <div class="flex flex-row  gap-5 relative">
            @include('partials.admin_sidemenu')
            <div class="lg:basis-5/6 basis-[100%] p-3">
                @include('partials.admin_navbar')
                <div class="w-full  shadow-lg p-5 mt-4 rounded-lg ">
                    <h1 class="text-3xl font-bold text-green-500">Pengaturan</h1>
                    <hr class="my-3">
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
                    @if (session()->has('message'))
                        <div class="alert alert-success shadow-lg">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                    fill="none" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span>{{ session('message') }}</span>
                            </div>
                        </div>
                    @endif
                    <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Judul Website</span>
                            </label>
                            <input type="text" name="title" placeholder="Ketik disini..."
                                class="input input-bordered w-full" value="{{ $settings->title }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Gelombang ke </span>
                            </label>
                            <input type="text" name="batch" placeholder="Ketik disini..."
                                class="input input-bordered w-full" value="{{ $settings->batch }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Brosur</span>
                                <span class="label-text">Selected :</span>
                            </label>
                            @if ($settings->brochure)
                                <img class="lg:max-w-[260px] my-3" src="{{ asset($settings->brochure) }}"
                                    alt="">
                            @endif
                            <input type="file" name="file" class="file-input file-input-bordered w-full" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Link Grup WhatsApp</span>
                            </label>
                            <input type="text" name="whatsapp_group" placeholder="Ketik disini..."
                                class="input input-bordered w-full" value="{{ $settings->whatsapp_group }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Informasi Penting</span>
                            </label>
                            <textarea class="textarea textarea-bordered" placeholder="Masukkan disini" name="information">{{ $settings->information }}</textarea>
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Narahubung 1</span>
                            </label>
                            <input type="text" name="contact_person_1" placeholder="Ketik disini..."
                                class="input input-bordered w-full" value="{{ $settings->contact_person_1 }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Narahubung 2</span>
                            </label>
                            <input type="text" name="contact_person_2" placeholder="Ketik disini..."
                                class="input input-bordered w-full" value="{{ $settings->contact_person_2 }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Narahubung 3</span>
                            </label>
                            <input type="text" name="contact_person_3" placeholder="Ketik disini..."
                                class="input input-bordered w-full" value="{{ $settings->contact_person_3 }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Izin kan untuk mengedit formulir (Calon Mahasiswa)</span>
                            </label>
                            <select class="select select-bordered" name="allow_to_edit">
                                <option value="1" @if ($settings->allow_to_edit == 1) selected @endif>Ya</option>
                                <option value="0" @if ($settings->allow_to_edit == 0) selected @endif>Tidak</option>
                            </select>
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Tampilkan hasil kelulusan kepada calon mahasiswa</span>
                            </label>
                            <select class="select select-bordered" name="show_registration_result">
                                <option value="1" @if ($settings->show_registration_result == 1) selected @endif>Ya</option>
                                <option value="0" @if ($settings->show_registration_result == 0) selected @endif>Tidak</option>
                            </select>
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Buka Pendaftaran</span>
                            </label>
                            <select class="select select-bordered" name="open_registration">
                                <option value="1" @if ($settings->open_registration == 1) selected @endif>Ya</option>
                                <option value="0" @if ($settings->open_registration == 0) selected @endif>Tidak</option>
                            </select>
                        </div>
                        <button
                            class="btn bg-green-500 hover:bg-green-700 border-none my-3 w-full lg:w-[260px] ">SIMPAN
                            PENGATURAN</button>
                    </form>
                </div>
            </div>
        </div>
    </section>


</body>

</html>

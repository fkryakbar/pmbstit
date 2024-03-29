<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('partials.landing_head')
    <title>Daftar Akun</title>
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body x-cloak x-data="{ sidebar_open: false }">
    @include('partials.landing_sidemenu')
    @include('partials.landing_navbar')
    <div class="lg:h-screen flex justify-center items-center">
        <div class="w-full border-2 my-10 rounded-lg mx-2 lg:w-[30%] shadow-lg h-fit p-5">
            @if ($settings->open_registration == 1)
                <div class="text-center">
                    <h1 class="text-4xl font-bold text-green-500">Daftar</h1>
                    <p class="text-center mt-3">Sebelum lanjut mengisi formulir pendaftaran, Anda harus membuat akun
                        terlebih
                        dahulu
                    </p>
                </div>
                <form class="mt-8" action="" autocomplete="off" method="POST">
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
                        <div class="alert alert-success shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6"
                                fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('message') }}</span>
                        </div>
                    @endif
                    @csrf
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Nama</span>
                        </label>
                        <input name="name" type="text" value="{{ old('name') }}" placeholder="Nama"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Email atau No.HP/WA</span>
                        </label>
                        <input type="text" name="email" placeholder="Email" value="{{ old('email') }}"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Password</span>
                        </label>
                        <input type="password" name="password" placeholder="Password"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text">Konfirmasi Password</span>
                        </label>
                        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"
                            class="input input-bordered w-full" />
                    </div>
                    <div class="form-control w-full mt-3">
                        <button class="btn bg-green-500 hover:bg-green-600 border-0 text-white">Daftar</button>
                        <span class="mt-3 text-center">Sudah Punya Akun? Silahkan <a class="link text-green-500"
                                href="/masuk">Masuk</a> disini</span>
                    </div>
                </form>
            @else
                <div class="text-red-500 text-center font-bold">
                    <div class="mx-auto inline-block">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                        </svg>
                    </div>
                    <div>
                        Pendaftaran Belum dibuka
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('partials.landing_footer')
</body>

</html>

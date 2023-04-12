<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.landing_head')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Users Edit</title>
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
            <div class="lg:basis-5/6 basis-[100%] p-3 h-screen">
                @include('partials.admin_navbar')
                <div class="w-full shadow-lg p-5 mt-4 rounded-lg max-w-sm  lg:max-w-full overflow-x-auto ">
                    <h1 class="text-3xl font-bold text-green-500">Edit Users</h1>
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
                    <form action="" method="POST" autocomplete="off">
                        @csrf
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Nama</span>
                            </label>
                            <input type="text" name="name" placeholder="Masukkan disini"
                                class="input input-bordered w-full" value="{{ $user->name }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Email</span>
                            </label>
                            <input type="text" name="email" placeholder="Masukkan disini"
                                class="input input-bordered w-full" value="{{ $user->email }}" />
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Role</span>
                            </label>
                            <select class="select select-bordered w-full" name="role">
                                <option value="mahasiswa" @if ($user->role == 'mahasiswa') selected @endif>Mahasiswa
                                </option>
                                <option value="admin" @if ($user->role == 'admin') selected @endif>Admin</option>
                            </select>
                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text">Reset Password</span>
                            </label>
                            <input type="text" placeholder="Masukkan disini" class="input input-bordered w-full"
                                name="password" />
                        </div>
                        <button class="btn mt-3 bg-green-500 border-0 hover:bg-green-700 w-full lg:w-[200px]">SIMPAN
                            AKUN</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

</body>

</html>

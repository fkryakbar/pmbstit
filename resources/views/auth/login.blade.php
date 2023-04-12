<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('partials.landing_head')
    <title>Masuk</title>
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
            <div class="text-center">
                <h1 class="text-4xl font-bold text-green-500">Login Page</h1>
            </div>
            <form class="mt-8" action="" autocomplete="off" method="POST">
                @csrf
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
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Email atau No.HP/WA</span>
                    </label>
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="Email"
                        class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text">Password</span>
                    </label>
                    <input type="password" name="password" placeholder="Password" class="input input-bordered w-full" />
                </div>
                <div class="form-control w-full mt-3">
                    <button class="btn bg-green-500 hover:bg-green-600 border-0">LOGIN</button>
                    <span class="mt-3 text-center">Belum Punya Akun? Silahkan <a class="link text-green-500"
                            href="/daftar">Daftar</a> disini</span>
                </div>
            </form>
        </div>
    </div>
    @include('partials.landing_footer')
</body>

</html>

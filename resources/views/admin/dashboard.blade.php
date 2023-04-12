<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.landing_head')
    <title>Admin Page</title>
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body x-cloak x-data="{ sidebar_open: false }">
    <section class="h-screen">
        <div class="flex flex-row h-screen gap-5 relative">
            @include('partials.admin_sidemenu')
            {{-- main page --}}
            <div class="lg:basis-5/6 basis-[100%] p-3">
                @include('partials.admin_navbar')
                <div class="w-full  shadow-lg p-5 mt-4 rounded-lg">
                    <h1 class="text-3xl font-bold text-green-500">Dashboard</h1>
                    <hr class="my-3">
                    <div class="lg:flex gap-3">
                        <div class="rounded-lg bg-green-500 p-5 lg:w-[300px] my-2 text-white font-bold uppercase ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                            </svg>

                            <h1 class="mt-2">
                                Mahasiswa Terdaftar : {{ count($forms) }}
                            </h1>
                        </div>
                        <div class="rounded-lg bg-blue-500 p-5 lg:w-[300px] my-2 text-white font-bold uppercase  ">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                            </svg>
                            <h1 class="mt-2">
                                Akun Terdaftar : {{ count($users) }}
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>

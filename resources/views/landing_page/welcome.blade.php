<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    @include('partials.landing_head')
    <title>PMB STIT ASSUNNIYYAH TAMBARANGAN</title>
</head>
<style>
    [x-cloak] {
        display: none !important;
    }
</style>

<body x-cloak x-data="{ sidebar_open: false }">
    @include('partials.landing_sidemenu')
    @include('partials.landing_navbar')
    <section
        class="bg-[url('/assets/static/image/kampus.jpg')] h-[550px] lg:h-[450px] bg-center bg-no-repeat bg-cover bg-fixed relative">
        <div class="bg-green-600 h-[550px] lg:h-[450px] w-full opacity-70 absolute">
        </div>
        <div class="absolute w-full">
            <div class="mt-10 flex flex-col p-5 items-center">
                <img width="150px" src="{{ asset('assets/static/image/logo-polos.png') }}" class="ml-auto mr-auto">
                <div class="lg:w-[70%] ml-auto mr-auto mt-4 text-center">
                    <h1 class="text-3xl lg:text-5xl font-bold text-white">{{ $settings->title }}</h1>
                </div>
                <div class="flex justify-center flex-col lg:block">
                    <a href="/daftar"
                        class="btn w-60 mt-4 m-2 bg-green-500 border-0 hover:bg-green-700 shadow-xl">Daftar
                        Sekarang</a>
                    <a href="#brosur"
                        class="btn w-60 mt-4 m-2 bg-green-500 border-0 hover:bg-green-700 shadow-xl">Brosur
                        Pendaftaran</a>
                </div>
            </div>
        </div>
    </section>
    <section id="alur" class="container mr-auto ml-auto mt-10 pr-3 pl-3">
        <div class="border-l-8 p-2 border-green-500">
            <h1 class="text-2xl lg:text-3xl font-bold text-green-500">ALUR PENDAFTARAN ONLINE</h1>
        </div>
        <div class=" mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl mt-8 ">
            <div class="grid gap-6 row-gap-10 lg:grid-cols-2">
                <div class="lg:py-6 lg:pr-16">
                    <div class="flex">
                        <div class="flex flex-col items-center mr-4">
                            <div>
                                <div class="flex items-center justify-center w-10 h-10 border rounded-full">
                                    <svg class="w-4 text-gray-600" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <line fill="none" stroke-miterlimit="10" x1="12" y1="2"
                                            x2="12" y2="22"></line>
                                        <polyline fill="none" stroke-miterlimit="10" points="19,15 12,22 5,15">
                                        </polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-px h-full bg-gray-300"></div>
                        </div>
                        <div class="pt-1 pb-8">
                            <p class="mb-2 text-lg font-bold">Mengisi Formulir Online</p>
                            <p class="text-gray-700">
                                Calon mahasiswa mengisi formulir di situs {{ env('APP_URL') }}
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex flex-col items-center mr-4">
                            <div>
                                <div class="flex items-center justify-center w-10 h-10 border rounded-full">
                                    <svg class="w-4 text-gray-600" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <line fill="none" stroke-miterlimit="10" x1="12" y1="2"
                                            x2="12" y2="22"></line>
                                        <polyline fill="none" stroke-miterlimit="10" points="19,15 12,22 5,15">
                                        </polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-px h-full bg-gray-300"></div>
                        </div>
                        <div class="pt-1 pb-8">
                            <p class="mb-2 text-lg font-bold">Proses Seleksi</p>
                            <p class="text-gray-700">
                                Calon mahasiswa akan mengikuti proses seleksi berupa tes tertulis dan tes wawancara di
                                kampus STIT Assunniyyah Tambarangan
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex flex-col items-center mr-4">
                            <div>
                                <div class="flex items-center justify-center w-10 h-10 border rounded-full">
                                    <svg class="w-4 text-gray-600" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                        <line fill="none" stroke-miterlimit="10" x1="12" y1="2"
                                            x2="12" y2="22"></line>
                                        <polyline fill="none" stroke-miterlimit="10" points="19,15 12,22 5,15">
                                        </polyline>
                                    </svg>
                                </div>
                            </div>
                            <div class="w-px h-full bg-gray-300"></div>
                        </div>
                        <div class="pt-1 pb-8">
                            <p class="mb-2 text-lg font-bold">Pengumuman</p>
                            <p class="text-gray-700">
                                Hasil seleksi akan diumumkan kepada calon mahasiswa
                            </p>
                        </div>
                    </div>
                    <div class="flex">
                        <div class="flex flex-col items-center mr-4">
                            <div>
                                <div class="flex items-center justify-center w-10 h-10 border rounded-full">
                                    <svg class="w-6 text-gray-600" stroke="currentColor" viewBox="0 0 24 24">
                                        <polyline fill="none" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-miterlimit="10" points="6,12 10,16 18,8">
                                        </polyline>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="pt-1 pb-8">
                            <p class="mb-2 text-lg font-bold">Daftar Ulang</p>
                            <p class="text-gray-700">
                                Setelah dinyatakan lolos, daftar ulang di STIT Assunniyyah Tambarangan sebagai mahasiswa
                                baru
                            </p>
                        </div>
                    </div>

                </div>
                <div class="relative">
                    <img class="inset-0 object-cover object-bottom w-full rounded"
                        src="{{ asset('assets/static/image/Personal files-bro.svg') }}" alt="" />
                </div>
            </div>
        </div>


    </section>
    <section id="brosur" class="bg-green-50 pt-6 pb-6 mt-6">
        <div class="container mr-auto ml-auto pr-3 pl-3">
            <div class="border-l-8 p-2 border-green-500">
                <h1 class="text-2xl lg:text-3xl font-bold text-green-500">BROSUR PENDAFTARAN</h1>
            </div>
            <div class="lg:flex lg:justify-between  mt-10">
                <div class="lg:w-[600px] hidden lg:block ">
                    <img src="{{ asset('assets/static/image/Resume folder-rafiki.svg') }}" alt="">
                </div>
                <div class="lg:w-[700px]  shadow-xl lg:shadow-none ">
                    <img src="{{ asset($settings->brochure) }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section id="narahubung" class="container mx-auto mt-6 mb-6 px-3">
        <div class="border-l-8 p-2 border-green-500">
            <h1 class="text-2xl lg:text-3xl font-bold text-green-500">NARAHUBUNG</h1>
        </div>
        <div class="lg:flex lg:justify-between mt-5">
            <div class="rounded-lg shadow-xl border-2 lg:p-10 :lg:p-4 p-4 text-center text-xs lg:text-2xl h-fit">
                <div class="flex justify-center mb-3 text-green-500 ">
                    <svg transform="scale(1.5)" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 01-.825-.242m9.345-8.334a2.126 2.126 0 00-.476-.095 48.64 48.64 0 00-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0011.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                    </svg>
                </div>
                <h1 class="font-bold text-green-500">{{ $settings->contact_person_1 }}</h1>
                <h1 class="font-bold text-green-500">{{ $settings->contact_person_2 }}</h1>
                <h1 class="font-bold text-green-500">{{ $settings->contact_person_3 }}</h1>
            </div>
            <div class="lg:w-[600px] mt-10 lg:mt-2">
                <img src="{{ asset('assets/static/image/Get in touch-cuate.svg') }}" alt="imgae">
            </div>
        </div>
    </section>
    <section id="narahubung" class="container mx-auto mt-6 mb-6 px-3">
        <div class="border-l-8 p-2 border-green-500">
            <h1 class="text-2xl lg:text-3xl font-bold text-green-500">LOKASI</h1>
        </div>
        <div class="lg:flex lg:justify-between mt-5">
            <div class="lg:w-[600px] mt-10 lg:mt-2 hidden lg:block">
                <img src="{{ asset('assets/static/image/Paper map-rafiki.svg') }}" alt="imgae">
            </div>
            <div class="rounded-lg shadow-xl  lg:p-10 :lg:p-4 p-4 text-center text-xs lg:text-2xl h-fit">
                <div class="flex justify-center mb-7 text-green-500 ">
                    <svg transform="scale(3)" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                        fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                        <path
                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    </svg>
                </div>
                <iframe class="lg:w-[600px] lg:h-[600px] w-full"
                    src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3984.3382009679835!2d115.12835299999999!3d-3.0033489999999996!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zM8KwMDAnMTIuMSJTIDExNcKwMDcnNDIuMSJF!5e0!3m2!1sid!2sid!4v1677929421392!5m2!1sid!2sid"
                    style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>

        </div>
    </section>
    @include('partials.landing_footer')
</body>

</html>

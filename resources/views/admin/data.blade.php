<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.landing_head')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src=" https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <title>Data Calon Mahasiswa</title>
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
                <div class="w-full  shadow-lg p-5 mt-4 rounded-lg max-w-sm  lg:max-w-full overflow-x-auto ">
                    <div class="flex justify-between">
                        <h1 class="text-3xl font-bold text-green-500">Data Calon Mahasiswa</h1>
                        <a href="/admin/data-mahasiswa/export"
                            class="flex justify-between gap-2 bg-yellow-400 px-2 h-12 hover:bg-yellow-600 rounded-lg items-center text-white">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                            </svg>

                            Export

                        </a>

                    </div>

                    <hr class="my-3">
                    @if (session()->has('message'))
                        <div class="alert alert-success mb-3">
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
                    <table class="table table-compact w-full" id="myTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>No Pendaftaran</th>
                                <th>Program Studi</th>
                                <th>Waktu Pendaftaran</th>
                                <th>Status Pendaftaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($forms as $key => $form)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $form->full_name }}</td>
                                    <td>{{ $form->registration_id }}</td>
                                    <td>{{ $form->study_program }}</td>
                                    <td>{{ $form->created_at }}</td>
                                    <td>
                                        @if ($form->registration_status == 'seleksi')
                                            <div
                                                class="p-2 bg-yellow-400 rounded-xl text-white font-bold w-fit uppercase">
                                                {{ $form->registration_status }}
                                            </div>
                                        @endif
                                        @if ($form->registration_status == 'lulus')
                                            <div
                                                class="p-2 bg-green-400 rounded-xl text-white font-bold w-fit uppercase">
                                                {{ $form->registration_status }}
                                            </div>
                                        @endif
                                        @if ($form->registration_status == 'tidak lulus')
                                            <div class="p-2 bg-red-400 rounded-xl text-white font-bold w-fit uppercase">
                                                {{ $form->registration_status }}
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/admin/data-mahasiswa/{{ $form->registration_id }}"
                                            class="btn btn-sm bg-green-500 hover:bg-green-700 border-none">Edit</a>
                                        <button onclick="hapus_form('{{ $form->registration_id }}')"
                                            class="btn btn-sm bg-red-500 hover:bg-red-700 border-none">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>
                </div>

            </div>
        </div>
        </div>
    </section>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>

    <script>
        function hapus_form(uid) {
            Swal.fire({
                title: 'Hapus?',
                text: "Form tidak dapat dipulihkan kembali",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/admin/data-mahasiswa/${uid}/hapus`
                }
            })
        }
    </script>
</body>

</html>

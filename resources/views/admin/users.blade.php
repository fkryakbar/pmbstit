<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.landing_head')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src=" https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <title>Users</title>
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
                    <h1 class="text-3xl font-bold text-green-500">Users</h1>
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
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Waktu Dibuat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <th>{{ $key + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>
                                        <a href="/admin/users/{{ $user->id }}"
                                            class="btn btn-sm bg-green-500 hover:bg-green-700 border-none">Edit</a>
                                        <button onclick="hapus_akun({{ $user->id }})"
                                            class="btn btn-sm bg-red-500 hover:bg-red-700 border-none">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>

                    </table>

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
        function hapus_akun(id) {
            Swal.fire({
                title: 'Hapus?',
                text: "Akun tidak dapat dipulihkan kembali",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Batal',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/admin/users/${id}/hapus`
                }
            })
        }
    </script>
</body>

</html>

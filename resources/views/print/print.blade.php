<!DOCTYPE html>
<html lang="en">

<head>
    <title>Formulir Pendaftaran</title>
</head>
<style>
    * {
        font-family: 'Arial', sans-serif;
    }

    h1 {
        font-size: 20px
    }

    table {
        width: 100%
    }

    table,
    th,
    td {
        border: 1px solid rgb(133, 133, 133);
        border-collapse: collapse;
        padding: 8px
    }
</style>

<body>
    <table style="border: none">
        <tr style="border: none">
            <th style="border: none">
                <img width="80px" src="https://stitastbr.ac.id/wp-content/uploads/2023/01/logo-polos.png" alt="">
            </th>
            <th style="border: none">
                <h1>Formulir Pendaftaran Mahasiswa Baru STIT Assuniyyah Tambarangan</h1>
            </th>
        </tr>
    </table>
    <hr>
    <p style="text-align: left">Data Pendaftaran : </p>
    <table>
        <tr>
            <td>No Pendaftaran</td>
            <td>{{ $data->registration_id }}</td>
        </tr>
        <tr>
            <td>Pilihan Program Studi</td>
            <td>{{ $data->study_program }}</td>
        </tr>

    </table>
    <p style="text-align: left">Data Calon Mahasiswa : </p>
    <table>
        <tr>
            <td>Nama</td>
            <td>{{ $data->full_name }}</td>

        </tr>
        <tr>
            <td>Tempat Lahir</td>
            <td>{{ $data->place_of_birth }}</td>
        </tr>
        <tr>
            <td>Tanggal Lahir</td>
            <td>{{ Carbon\Carbon::parse($data->date_of_birth)->translatedFormat('d F Y') }}</td>
        </tr>
        <tr>
            <td>NISN</td>
            <td>{{ $data->nisn }}</td>
        </tr>
        <tr>
            <td>Jenis Kelamin</td>
            <td>{{ $data->gender }}</td>
        </tr>
        <tr>
            <td>No. NIK/KTP/SIM</td>
            <td>{{ $data->id_number }}</td>
        </tr>
        <tr>
            <td>Asal SMA/SMK/MA</td>
            <td>{{ $data->graduate_from }}</td>
        </tr>
        <tr>
            <td>Program/Jurusan SMA/SMK/MA</td>
            <td>{{ $data->highschool_program }}</td>
        </tr>
        <tr>
            <td>Tahun Lulus</td>
            <td>{{ $data->year_of_graduate }}</td>
        </tr>
        <tr>
            <td>Alamat Sekarang</td>
            <td>{{ $data->address }}</td>
        </tr>
        <tr>
            <td>No. HP/WA</td>
            <td>{{ $data->phone_number }}</td>
        </tr>
    </table>
    <div style="position: fixed; right: 0;">
        <br>
        <br>
        .................., {{ $date }}
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        {{ $data->full_name }}
    </div>
</body>

</html>

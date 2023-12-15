@extends('layouts.main_admin')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> PROFILE
            &nbsp; LENGKAP</h1>
    </div>
    <!-- <div class="edit text-sm-end"><button type="button" class="btn btn-secondary mt-3 mb-3" ><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i> Edit Profil</button></div>                        -->
    <div class="informasi py-3 px-3">

        <table class="table  mt-4">
            <tr>
                <th scope="col">ID_Pegawai</th>
                <th scope="col">Nama_Pegawai</th>
                <th scope="col">Jenis_Kelamin</th>
                <th scope="col">TMT_Kerja</th>
                <th scope="col">Tempat_Lahir</th>
                <th scope="col">Tanggal_Lahir</th>
                <th scope="col">Jenjang_Pendidikan</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                        <td>{{ $data->id_pegawai }}</td>
                        <td>{{ $data->nama_pegawai }}</td>
                        <td>@if ($data->jenis_kelamin == 'L')
                            Laki-Laki
                        @else
                            Perempuan
                        @endif</td>
                        <td>{{ $data->tmt_kerja }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->jenjang_pendidikan }}</td>
                        <td>{{ $data->status }}</td>
                </tr>
        </table>
    </div>
@endsection

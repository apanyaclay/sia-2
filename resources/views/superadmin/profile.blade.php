@extends('layouts.main_superadmin')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> PROFILE
            &nbsp; LENGKAP</h1>
    </div>
    <div class="edit text-sm-end">
        <a type="button" href="{{ url('superadmin/akun/edit') }}"
            class="btn btn-secondary mt-3 mb-3"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i> Edit Akun</a>
        <a type="button" href="{{ url('superadmin/profile/edit') }}"
            class="btn btn-secondary mt-3 mb-3"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i> Edit Profil</a>
    </div>
    <div class="informasi py-3 px-3">

        <table class="table  mt-4">
            <tr>
                <th>ID_Kepsek</th>
                <th>Nama_Kepsek</th>
                <th>Jenjang_Pendidikan</th>
                <th>Jenis_Kelamin</th>
                <th>Tempat_Lahir</th>
                <th>Tanggal_Lahir</th>
                <th>TMT_Kerja</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->id_kepsek }}</td>
                    <td>{{ $data->nama_kepsek }}</td>
                    <td>{{ $data->jenjang_pendidikan }}</td>
                    <td>
                        @if ($data->jenis_kelamin == 'L')
                            Laki-Laki
                        @else
                            Perempuan
                        @endif
                    </td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->tmt_kerja }}</td>
                    <td>{{ $data->status }}</td>
                </tr>
            <tbody>
        </table>
    </div>
    <!-- <button type="button" class="btn btn-secondary mt-3 mb-3" >Print Jadwal</button> -->
    </div>

    </div>
    </div>
@endsection

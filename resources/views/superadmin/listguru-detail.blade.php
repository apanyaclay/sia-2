@extends('layouts.main_superadmin')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> PROFILE
            &nbsp; LENGKAP</h1>
    </div>
    <div class="informasi py-3 px-3">

        <table class="table  mt-4">
            <tr>
                <th scope="col">NUPTK</th>
                <th scope="col">NIP</th>
                <th scope="col">NAMA</th>
                <th scope="col">Jenis_Kelamin</th>
                <th scope="col">Tempat_Lahir</th>
                <th scope="col">Tanggal_Lahir</th>
                <th scope="col">Status_Kepegawaian</th>
                <th scope="col">Jenjang_Pendidikan</th>
                <th scope="col">TMT_Kerja</th>
                <th scope="col">JJM</th>
                <th scope="col">Jenis PTK</th>
                <th scope="col">Status</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->nuptk }}</td>
                    <td>{{ $data->nip }}</td>
                    <td>{{ $data->nama_guru }}</td>
                    <td>@if ($data->jenis_kelamin == 'L')
                        Laki-Laki
                    @else
                        Perempuan
                    @endif</td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->status_kepegawaian }}</td>
                    <td>{{ $data->jenjang_pendidikan }}</td>
                    <td>{{ $data->tmt_kerja }}</td>
                    <td>{{ $data->jjm }}</td>
                    <td>{{ $data->jenis_ptk }}</td>
                    <td>{{ $data->status }}</td>

                </tr>
        </table>
    </div>
@endsection

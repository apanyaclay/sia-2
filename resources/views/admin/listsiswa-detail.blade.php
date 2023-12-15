@extends('layouts.main_admin')

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
                <th scope="col">NISN</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tempat Lahir</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Agama</th>
                <th scope="col">Alamat</th>
                <th scope="col">No hp</th>
                <th scope="col">KELAS</th>
                <th scope="col">Status dlm Keluarga</th>
                <th scope="col">Nama Ayah</th>
                <th scope="col">Nama Ibu</th>
                <th scope="col">Pekerjaan Ayah</th>
                <th scope="col">Pekerjaan Ibu</th>
                <th scope="col">No Rek Bank</th>
                <th scope="col">Bank Atas Nama</th>
                <th scope="col">Status Siswa</th>
                <th scope="col">Sekolah Asal</th>
                <th scope="col">Anak Ke</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $data->nisn }}</td>
                    <td>{{ $data->nama_siswa }}</td>
                    <td>@if ($data->jenis_kelamin == 'L')
                        Laki-Laki
                    @else
                        Perempuan
                    @endif</td>
                    <td>{{ $data->tempat_lahir }}</td>
                    <td>{{ $data->tanggal_lahir }}</td>
                    <td>{{ $data->agama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->no_hp }}</td>
                    <td>{{ $data->kelas_id }}</td>
                    <td>{{ $data->status_dlm_klrg }}</td>
                    <td>{{ $data->nama_ayah }}</td>
                    <td>{{ $data->nama_ibu }}</td>
                    <td>{{ $data->pekerjaan_ayah }}</td>
                    <td>{{ $data->pekerjaan_ibu }}</td>
                    <td>{{ $data->no_rek_bank }}</td>
                    <td>{{ $data->bank_atas_nama }}</td>
                    <td>{{ $data->status_siswa }}</td>
                    <td>{{ $data->sekolah_asal }}</td>
                    <td>{{ $data->anak_ke }}</td>
                </tr>
        </table>
    </div>
@endsection

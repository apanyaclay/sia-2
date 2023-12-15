@extends('layouts.main_siswa')


@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> PROFILE
            &nbsp; LENGKAP</h1>
    </div>
    <div class="edit text-sm-end">
        <a href="{{ url('siswa/akun/edit') }}" type="button"
            class="btn btn-secondary mt-3 mb-3"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i> Edit Akun</a>
        <a href="{{ url('siswa/profile/edit') }}" type="button"
            class="btn btn-secondary mt-3 mb-3"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i> Edit Profil</a>
    </div>
    <div class="informasi py-3 px-3">

        <table class="table  mt-4">
            <tr>
                <th>Nama</th>
                <td>{{ $data->nama_siswa }}</td>
            </tr>
            <tr>
                <th>NIS/NISN</th>
                <td>{{ $data->nisn }}</td>
            </tr>
            <tr>
                <th>Tempat Tanggal Lahir</th>
                <td>{{ $data->tempat_lahir }}, {{ $data->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>
                    @if ($data->jenis_kelamin == 'L')
                        Laki-Laki
                    @else
                        Perempuan
                    @endif
                </td>
            </tr>
            <tr>
                <th>Agama</th>
                <td>{{ $data->agama }}</td>
            </tr>
            <tr>
                <th>Status dalam Keluarga</th>
                <td>{{ $data->status_dlm_klrg }}</td>
            </tr>
            <tr>
                <th>Anak Ke</th>
                <td>{{ $data->anak_ke }}</td>
            </tr>
            <tr>
                <th>Alamat Peserta Didik</th>
                <td>{{ $data->alamat }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon Rumah</th>
                <td>{{ $data->no_hp }}</td>
            </tr>
            <tr>
                <th>Sekolah Asal</th>
                <td>{{ $data->sekolah_asal }}</td>
            </tr>
            <tr>
                <th>Nama Orang Tua</th>
                <td></td>
            </tr>
            <tr>
                <th>a. Ayah</th>
                <td>{{ $data->nama_ayah }}</td>
            </tr>
            <tr>
                <th>b. Ibu</th>
                <td>{{ $data->nama_ibu }}</td>
            </tr>
            <tr>
                <th>Alamat Orang Tua</th>
                <td>{{ $data->alamat }}</td>
            </tr>
            <tr>
                <th>Nomor Telepon Rumah</th>
                <td>{{ $data->no_hp }}</td>
            </tr>
            <tr>
                <th>Pekerjaan Orang Tua</th>
                <td></td>
            </tr>
            <tr>
                <th>a. Ayah</th>
                <td>{{ $data->pekerjaan_ayah }}</td>
            </tr>
            <tr>
                <th>b.Ibu</th>
                <td>{{ $data->pekerjaan_ibu }}</td>
            </tr>
        </table>
    </div>
    <!-- <button type="button" class="btn btn-secondary mt-3 mb-3" >Print Jadwal</button> -->
    </div>
@endsection

@extends('layouts.main_guru')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> PROFILE
            &nbsp; LENGKAP</h1>
    </div>
    <div class="edit text-sm-end">
        <a href="{{ url('guru/akun/edit') }}" type="button" class="btn btn-secondary mt-3 mb-3"><i class="fa-solid fa-file-pen"
                style="color: #ffffff;"></i> Edit Akun</a>
        <a href="{{ url('guru/profile/edit') }}" type="button" class="btn btn-secondary mt-3 mb-3"><i
                class="fa-solid fa-file-pen" style="color: #ffffff;"></i> Edit Profil</a>
    </div>
    <div class="informasi py-3 px-3">

        <table class="table  mt-4">
            <tr>
                <th>Nama</th>
                <td>{{ $data->nama_guru }}</td>
            </tr>
            <tr>
                <th>NUPTK</th>
                <td>{{ $data->nuptk }}</td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td>{{ $data->tempat_lahir }}</td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $data->tanggal_lahir }}</td>
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
                <th>NIP</th>
                <td>{{ $data->nip }}</td>
            </tr>
            <tr>
                <th>Status Kepegawaian</th>
                <td>{{ $data->status_kepegawaian }}</td>
            </tr>
            <tr>
                <th>Jenis PTK</th>
                <td>{{ $data->jenis_ptk }}</td>
            </tr>
            <tr>
                <th>Jenjang</th>
                <td>{{ $data->jenjang_pendidikan }}</td>
            </tr>
            <th>TMT Kerja</th>
            <td>{{ $data->tmt_kerja }}</td>
            </tr>
            <tr>
                <th>Jumlah Jam Mengajar</th>
                <td>{{ $data->jjm }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $data->status }}</td>
            </tr>
        </table>
    </div>
    <!-- <button type="button" class="btn btn-secondary mt-3 mb-3" >Print Jadwal</button> -->
    </div>

    </div>
    </div>
@endsection

@extends('layouts.main_admin')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> EDIT &nbsp;
            PROFILE</h1>
    </div>

    <div class="informasi py-3 px-3">
        <form action="{{ url('admin/profile/edit') }}" method="POST">
            @csrf
            <table class="table  mt-4">
                <tr>
                    <th>Nama Pegawai</th>
                    <td><input type="text" name="nama" id="nama" required value="{{ $data->nama_pegawai }}">
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td>
                        <select name="jenis_kelamin" id="jenis_kelamin">
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td><input type="text" name="tempat_kerja" id="tempat_kerja" required
                            value="{{ $data->tempat_lahir }}"></td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td><input type="date" name="tanggal_lahir" id="tanggal_lahir" required
                            value="{{ $data->tanggal_lahir }}"></td>
                </tr>
                <tr>
                    <th>Jenjang Pendidikan</th>
                    <td><input type="text" name="jenjang" id="jenjang" required
                            value="{{ $data->jenjang_pendidikan }}"></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </form>
    </div>
@endsection

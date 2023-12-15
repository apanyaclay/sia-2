@extends('layouts.main_superadmin')
@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> SETTING
            &nbsp; LANDING PAGE</h1>
    </div>

    <div class="informasi py-3 px-3">

        <form action="{{ url('superadmin/settings/edit') }}" method="POST">
            @csrf
            <table class="table  mt-4">
                    <tr>
                        <th>TITLE</th>
                        <td><input type="text" name="title" id="title" required value="{{ $data->title }}"></td>
                    </tr>
                    <tr>
                        <th>TUJUAN</th>
                        <td><input type="text" name="tujuan" id="tujuan" required value="{{ $data->tujuan }}"></td>
                    </tr>
                    <tr>
                        <th>VISI DAN MISI</th>
                        <td><input type="text" name="visi_misi" id="visi_misi" required value="{{ $data->visi_misi }}">
                        </td>
                    </tr>
                    <tr>
                        <th>TENTANG</th>
                        <td><input type="text" name="tentang" id="tentang" required value="{{ $data->tentang }}"></td>
                    </tr>
                    <tr>
                        <th>ALAMAT</th>
                        <td><input type="text" name="alamat" id="alamat" required value="{{ $data->alamat }}"></td>
                    </tr>
                    <tr>
                        <th>KEC & KOTA</th>
                        <td><input type="text" name="kec_kota" id="kec_kota" required value="{{ $data->kec_kota }}">
                        </td>
                    </tr>
                    <tr>
                        <th>PROVINSI</th>
                        <td><input type="text" name="provinsi" id="provinsi" required value="{{ $data->provinsi }}">
                        </td>
                    </tr>
                    <tr>
                        <th>PHONE</th>
                        <td><input type="text" name="phone" id="phone" required value="{{ $data->phone }}"></td>
                    </tr>
            </table>
            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </form>
    </div>
@endsection

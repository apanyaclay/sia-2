@extends('layouts.main_superadmin')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> SETTINGS
            &nbsp; PAGE</h1>
    </div>
    <div class="edit text-sm-end"><a href="{{ url('superadmin/settings/edit') }}" type="button"
            class="btn btn-secondary mt-3 mb-3"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i> Edit Settings</a>
    </div>
    <div class="informasi py-3 px-3">
        <table class="table  mt-4">
            <tr>
                <th>TITLE</th>
                <td>{{ $data->title }}</td>
            </tr>
            <tr>
                <th>TUJUAN</th>
                <td>{{ $data->tujuan }}</td>
            </tr>
            <tr>
                <th>VISI DAN MISI</th>
                <td>{{ $data->visi_misi }}</td>
            </tr>
            <tr>
                <th>TENTANG</th>
                <td>{{ $data->tentang }}</td>
            </tr>
            <tr>
                <th>ALAMAT</th>
                <td>{{ $data->alamat }}</td>
            </tr>
            <tr>
                <th>KEC & KOTA</th>
                <td>{{ $data->kec_kota }}</td>
            </tr>
            <tr>
                <th>PROVINSI</th>
                <td>{{ $data->provinsi }}</td>
            </tr>
            <tr>
                <th>PHONE</th>
                <td>{{ $data->phone }}</td>
            </tr>
        </table>
    </div>
    <!-- <button type="button" class="btn btn-secondary mt-3 mb-3" >Print Jadwal</button> -->
    </div>
@endsection

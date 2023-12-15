@extends('layouts.main_admin')

@section('container')
    <!-- Page Heading -->
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> Daftar Tata
        Usaha </h1>
    </div>
    <div class="tablewali">
        <table class="table text-center table-bordered  mt-4"style="width:900px ;">
            <thead style="background-color: #748E63; color: #000;">
                <tr>
                    <th scope="col">ID Pegawai</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Jenjang Pendidikan</th>
                    <td>Detail Profile</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_pegawai }}</td>
                        <td>{{ $item->nama_pegawai }}</td>
                        <td>{{ $item->jenjang_pendidikan }}</td>
                        <td><a type="button" href="{{ url('admin/listtu/detail', $item->id_pegawai) }}"
                                class="btn btn-warning">Lihat Detail</a></td>
                        <td><a type="button" href="{{ url('admin/listtu/edit', $item->id_pegawai) }}"
                                class="btn btn-warning"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>  Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

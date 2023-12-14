@extends('layouts.main_admin')

@section('container')
    <!-- Page Heading -->
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> Daftar
        Ekstrakurikuler yang Diambil Siswa</h1>
    </div>
    <div class="tablewali">
        <table class="table text-center table-bordered  mt-4"style="width:900px ;">
            <thead style="background-color: #748E63; color: #000;">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">NAMA</th>
                    <th scope="col">EKSTRAKURIKULER</th>
                    <th scope="col">TAHUN AJARAN</th>
                    <th scope="col">SEMESTER</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $item->ids }}</th>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->nama_ekskul }}</td>
                        <td>{{ $item->tahun_ajaran }}</td>
                        <td>{{ $item->semester }}</td>
                        <td><a type="button" href="{{ url('admin/listekskulsiswa/edit', $item->siswa_id) }}"
                                class="btn btn-warning"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i></a>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

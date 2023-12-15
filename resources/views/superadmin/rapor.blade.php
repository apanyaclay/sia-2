@extends('layouts.main_superadmin')

@section('container')
    <!-- Page Heading -->
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> DAFTAR KELAS
    </h1>
    </div>

    <div class="tablewali">
        <table class="table text-center table-bordered  mt-4"style="width:900px ;">
            <thead style="background-color: #748E63; color: #000;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">KELAS</th>
                    <th scope="col">DETAIL</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->nama_kelas }}</td>
                        <td><a type="button" href="{{ url('superadmin/rapor/listsiswa', $item->id) }}"
                                class="btn btn-warning">Lists Siswa</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

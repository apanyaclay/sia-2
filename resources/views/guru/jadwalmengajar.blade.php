@extends('layouts.main_guru')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> JADWAL
            MENGAJAR TAHUN AJARAN ({{ $ta }})</h1>
    </div>

    <table class="table text-center table-bordered  mt-4">
        <thead style="background-color: #748E63; color: #000;">
            <tr>
                <th scope="col">HARI</th>
                <th scope="col">MAPEL</th>
                <th scope="col">JAM</th>
                <th scope="col">KELAS</th>
            </tr>
        </thead>
        <tbody class="table-group-divider table-warning">
            @foreach ($data as $item)
                <tr>
                    <th>{{ $item->hari }}</th>
                    <td>{{ $item->nama_mapel }}</td>
                    <td>{{ $item->waktu_mulai }} - {{ $item->waktu_selesai }}</td>
                    <td>{{ $item->nama_kelas }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <button type="button" class="btn btn-secondary mt-3 mb-3"><i class="fas fa-download fa-sm text-white-50"></i> Print
        Jadwal </button>
    </div>
@endsection

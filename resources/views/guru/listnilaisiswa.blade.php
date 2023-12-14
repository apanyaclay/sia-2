@extends('layouts.main_guru')

@section('container')
    <!-- Page Heading -->
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> DAFTAR NILAI
        {{ $siswa->nama_siswa }}</h1>
    </div>
    <div class="table text-center">
        <table class="table text-center table-bordered  mt-4"style="width:900px ;">
            <thead style="background-color: #748E63; color: #000;">
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">TAHUN AJARAN - SEMESTER</th>
                    <th scope="col">NAMA MAPEL</th>
                    <th scope="col">UH 1</th>
                    <th scope="col">UH 2</th>
                    <th scope="col">UTS</th>
                    <th scope="col">UH 3</th>
                    <th scope="col">UAS</th>
                    <th scope="col">KKM</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 0; $i < count($data); $i++)
                    <tr>
                        <th scope="row">{{ $i + 1 }}</th>
                        <td>{{ $data[$i]->tahun_ajaran }} - {{ $data[$i]->semester }}</td>
                        <td>{{ $data[$i]->nama_mapel }}</td>
                        <td>{{ $data[$i]->ulha_1 }}</td>
                        <td>{{ $data[$i]->ulha_2 }}</td>
                        <td>{{ $data[$i]->uts }}</td>
                        <td>{{ $data[$i]->ulha_3 }}</td>
                        <td>{{ $data[$i]->uas }}</td>
                        <td>{{ $data[$i]->kkm }}</td>
                        <td><a type="button" href="{{ url('guru/listnilaisiswa/editnilai', $data[$i]->ids) }}"
                                class="btn btn-warning"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>Edit
                                Nilai</a></td>
                    </tr>
                @endfor
            </tbody>
        </table>
    </div>
@endsection

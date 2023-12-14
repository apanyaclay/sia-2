@extends('layouts.main_siswa')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> JADWAL
            {{ $kelas->nama_kelas }}</h1>
    </div>

    <table class="table text-center table-bordered  mt-4">
        <thead style="background-color: #748E63; color: #000;">
            <tr>
                <th scope="col">J A M</th>
                <th scope="col">SENIN</th>
                <th scope="col">SELASA</th>
                <th scope="col">RABU</th>
                <th scope="col">KAMIS</th>
                <th scope="col">JUMAT</th>
                <th scope="col">SABTU</th>
            </tr>
        </thead>
        <tbody class="table-group-divider table-warning">
            @for ($i = 0; $i < count($jam); $i++)
                <tr>
                    <th>{{ $jam[$i]->waktu_mulai }} - {{ $jam[$i]->waktu_selesai }}</th>
                    <td>@if (count($senin) > $i)
                        {{$senin[$i]->nama_mapel}}
                    @else
                        -
                    @endif</td>
                    <td>@if (count($selasa) > $i)
                        {{$selasa[$i]->nama_mapel}}
                    @else
                        -
                    @endif</td>
                    <td>@if (count($rabu) > $i)
                        {{$rabu[$i]->nama_mapel}}
                    @else
                        -
                    @endif</td>
                    <td>@if (count($kamis) > $i)
                        {{$kamis[$i]->nama_mapel}}
                    @else
                        -
                    @endif</td>
                    <td>@if (count($jumat) > $i)
                        {{$jumat[$i]->nama_mapel}}
                    @else
                        -
                    @endif</td>
                    <td>@if (count($sabtu) > $i)
                        {{$sabtu[$i]->nama_mapel}}
                    @else
                        -
                    @endif</td>
                </tr>
            @endfor
            
        </tbody>
    </table>

    <button type="button" class="btn btn-secondary mt-3 mb-3"><i class="fas fa-download fa-sm text-white-50"></i> Print
        Jadwal </button>
    </div>
@endsection

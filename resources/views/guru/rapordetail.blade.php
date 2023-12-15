@extends('layouts.main_guru')


@section('container')
    <!-- Page Heading -->
    <div class="isi ">

        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> Hasil
            Belajar</h1>
    </div>
    <!-- Isi Rapor Siswa -->
    <!-- SIKAP -->
    <div class="judulrapor px-3 py-3">
        <div class="poin"> A. SIKAP</div>
        <div class="poin">1. Sikap Spiritual</div>
    </div>
    <table class="table text-center table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Predikat</th>
                <th scope="col">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sikap as $item)
                <tr>
                    <th>{{ $item->p_spiritual }}</th>
                    <td style="text-align: justify;">{{ $item->d_spiritual }}.</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </table>

    <!-- SOSIAL -->
    <div class="judulrapor px-3 py-3">
        <div class="poin">2. Sikap Sosial</div>
    </div>
    <table class="table text-center table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col">Predikat</th>
                <th scope="col">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sikap as $item)
                <tr>
                    <th>{{ $item->p_sosial }}</th>
                    <td style="text-align: justify;">{{ $item->d_sosial }}.</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </table>

    <!-- PENGETAHUAN -->
    <div class="judulrapor px-3 py-3">
        <div class="poin"> B. PENGETAHUAN</div>
    </div>
    <table class="table text-center table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Mata Pelajaran </th>
                <th scope="col">Nilai</th>
                <th scope="col">Predikat</th>
                <th scope="col">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($rapor); $i++)
                <tr>
                    <th>{{ $i + 1 }}</th>
                    <td>{{ $rapor[$i]->nama_mapel }}</td>
                    <th scope="row">{{ $rapor[$i]->p_nilai }}</th>
                    <th scope="row">{{ $rapor[$i]->p_predikat }}</th>
                    <td style="text-align: justify;">{{ $rapor[$i]->p_deskripsi }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
    </table>

    <!-- KETERAMPILAN -->
    <div class="judulrapor px-3 py-3">
        <div class="poin"> C. KETERAMPILAN</div>
    </div>
    <table class="table text-center table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Mata Pelajaran </th>
                <th scope="col">Nilai</th>
                <th scope="col">Predikat</th>
                <th scope="col">Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($rapor); $i++)
                <tr>
                    <th>{{ $i + 1 }}</th>
                    <td>{{ $rapor[$i]->nama_mapel }}</td>
                    <th scope="row">{{ $rapor[$i]->k_nilai }}</th>
                    <th scope="row">{{ $rapor[$i]->k_predikat }}</th>
                    <td style="text-align: justify;">{{ $rapor[$i]->k_deskripsi }}</td>
                </tr>
            @endfor
        </tbody>
    </table>
    </table>

    <!--EKSTRAKURIKULER -->
    <div class="judulrapor px-3 py-3">
        <div class="poin">D . EKSTRAKURIKULER</div>
    </div>
    <table class="table text-center table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Kegiatan Ekstrakurikuler</th>
                <th scope="col">Nilai</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($ekskul); $i++)
                <tr>
                    <th>{{ $i + 1 }}</th>
                    <td>{{ $ekskul[$i]->nama_ekskul }}</td>
                    <th scope="row">{{ $ekskul[$i]->nilai }}</th>
                    <td>{{ $ekskul[$i]->keterangan }}</td>
                </tr>
            @endfor
        </tbody>
    </table>


    <!--PRESTASI -->
    <div class="judulrapor px-3 py-3">
        <div class="poin">E. PRESTASI</div>
    </div>
    <table class="table text-center table-bordered">
        <thead class="table-secondary">
            <tr>
                <th scope="col">NO</th>
                <th scope="col">Jenis Prestasi</th>
                <th scope="col">Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < count($prestasi); $i++)
                <tr>
                    <th>{{ $i + 1 }}</th>
                    <td>{{ $prestasi[$i]->jenis_prestasi }}</td>
                    <td>{{ $prestasi[$i]->deskripsi }}</td>
                </tr>
            @endfor
        </tbody>
    </table>

    <!--KETIDAKHADIRAN -->
    <div class="judulrapor px-3 py-3">
        <div class="poin">F. KETIDAKHADIRAN</div>
    </div>
    <table class="table text-left table-bordered">
        <tr>
            <td>Sakit</td>
            <td>{{count($sakit)}} Hari</td>
        </tr>
        <tr>
            <td>Izin</td>
            <td>{{count($izin)}} Hari</td>
        </tr>
        <tr>
            <td>Tanpa Keterangan</td>
            <td>{{count($alpa)}} Hari</td>
        </tr>
    </table>

    </div>
@endsection

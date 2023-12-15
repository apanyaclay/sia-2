@extends('layouts.main_superadmin')

@section('container')
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> EDIT
        EKSTRAKURIKULER</h1>
    </div>
    <br>
    <div class="tablewali">
        <form action="{{ url('superadmin/listekskulsiswa/edit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode">ID</label>
                <input type="text" class="form-control" id="kode" name="kode" value="{{ $data->ids }}" readonly>
            </div>
            <div class="form-group">
                <label for="nama">NAMA</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama_siswa }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="ekskul">Ekstrakurikuler</label>
                <select class="form-control" name="ekskul" id="ekskul">
                    <option value="" disabled selected>Silahkan Pilih</option>
                    @foreach ($ekskul as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_ekskul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun Ajaran - Semester</label>
                <select name="tahun" id="tahun" class="form-control">
                    <option value="" disabled selected>Silahkan Pilih</option>
                    @foreach ($tahun as $items)
                        <option value="{{ $items->id }}">{{ $items->tahun_ajaran }} - {{ $items->semester }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Edit</button>
        </form>
    </div>
@endsection

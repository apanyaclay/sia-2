@extends('layouts.main_superadmin')

@section('container')
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> EDIT KELAS
    </h1>

    <div class="tablewali">
        <form action="{{ url('superadmin/listkelassiswa/edit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode" hidden>ID:</label>
                <input type="text" class="form-control" id="kode" name="kode" value="{{ $kode }}" readonly
                    hidden>
            </div>
            <div class="form-group">
                <label for="wali_kelas">Wali Kelas:</label>
                <select name="wali_kelas" id="wali_kelas" class="form-control">
                    <option value="">-- Silahkan Pilih --</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->nuptk }}">{{ $item->nama_guru }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nama_kelas">Nama Kelas:</label>
                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                    value="{{ $kelas->nama_kelas }}" required>
            </div>
            <div class="form-group">
                <label for="tingkatan_kelas">Tingkatan Kelas:</label>
                <select name="tingkatan_kelas" id="tingkatan_kelas" class="form-control">
                    <option value="">-- Silahkan Pilih --</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                </select>
            </div>
            <div class="form-group">
                <label for="kelompok_kelas">Kelompok Kelas:</label>
                <select name="kelompok_kelas" id="kelompok_kelas" class="form-control">
                    <option value="">-- Silahkan Pilih --</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Edit Kelas</button>
        </form>
    </div>
@endsection

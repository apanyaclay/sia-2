@extends('layouts.main_guru')

@section('container')
    <!-- Page Heading -->

    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> TAMBAH NILAI
    </h1>
    </div>

    <div class="tablewali">
        <form action="{{ url('guru/listsiswa/tambahnilai') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nis">NISN:</label>
                <input type="text" class="form-control" id="nis" name="nis" value="{{ $kode }}" readonly>
            </div>
            <div class="form-group">
                <label for="kode">KODE MAPEL:</label>
                <input type="text" class="form-control" id="kode" name="kode" value="{{ $mapel->id }}"
                    readonly>
            </div>
            <div class="form-group">
                <label for="ta">TAHUN AJARAN:</label>
                <select name="ta" id="ta" class="form-control">
                    <option value="">-- Silahkan Pilih --</option>
                    @foreach ($ta as $item)
                        <option value="{{ $item->id }}">{{ $item->tahun_ajaran }} - {{ $item->semester }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="uh1">NILAI UH 1:</label>
                <input type="number" class="form-control" id="uh1" name="uh1" required>
            </div>
            <div class="form-group">
                <label for="uh2">NILAI UH 2:</label>
                <input type="number" class="form-control" id="uh2" name="uh2" required>
            </div>
            <div class="form-group">
                <label for="uts">NILAI UTS:</label>
                <input type="number" class="form-control" id="uts" name="uts" required>
            </div>
            <div class="form-group">
                <label for="uh3">NILAI UH 3:</label>
                <input type="number" class="form-control" id="uh3" name="uh3" required>
            </div>
            <div class="form-group">
                <label for="uas">NILAI UAS:</label>
                <input type="number" class="form-control" id="uas" name="uas" required>
            </div>
            <button type="submit" class="btn btn-warning">Tambah Nilai</button>
        </form>
    </div>
@endsection

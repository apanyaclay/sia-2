@extends('layouts.main_superadmin')

@section('container')
    <!-- Page Heading -->
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> TAMBAH MATA
        PELAJARAN</h1>
    </div>
    <br>
    <div class="tablewali">
        <form action="{{ url('superadmin/mapel/tambah') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Mapel:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="kkm">KKM:</label>
                <input type="text" class="form-control" id="kkm" name="kkm" required>
            </div>
            <div class="form-group">
                <label for="guru">Guru:</label>
                <select name="guru" id="guru" class="form-control" required>
                    <option value="" disabled>-- Pilih Guru --</option>
                    @foreach ($data as $item)
                        <option value="{{ $item->nuptk }}">{{ $item->nama_guru }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Tambah Mapel</button>
        </form>
    </div>
@endsection

@extends('layouts.main_guru')

@section('container')
    <!-- Page Heading -->

    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> EDIT RAPOR
    </h1>
    </div>

    <div class="tablewali">
        <form action="{{ url('guru/rapor/listsiswa/edit') }}" method="POST">
            @csrf
            @foreach ($data as $item)
                <div class="form-group">
                    <label for="id" hidden>ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $item->id }}" hidden>
                </div>
                <div class="form-group">
                    <label for="nisn">NISN:</label>
                    <input type="text" class="form-control" id="nisn" name="nisn" value="{{ $kode }}" readonly>
                </div>
                <div class="form-group">
                    <label for="pre_spir">PREDIKAT SPIRITUAL:</label>
                    <input type="text" class="form-control" id="pre_spir" name="pre_spir" required
                        value="{{ $item->p_spiritual }}">
                </div>
                <div class="form-group">
                    <label for="des_spir">DESKRIPSI SPIRITUAL:</label>
                    <input type="text" class="form-control" id="des_spir" name="des_spir" required
                        value="{{ $item->d_spiritual }}">
                </div>
                <div class="form-group">
                    <label for="pre_sol">PREDIKAT SOSIAL:</label>
                    <input type="text" class="form-control" id="pre_sol" name="pre_sol" required
                        value="{{ $item->p_sosial }}">
                </div>
                <div class="form-group">
                    <label for="des_sol">DESKRIPSI SOSIAL:</label>
                    <input type="text" class="form-control" id="des_sol" name="des_sol" required
                        value="{{ $item->d_sosial }}">
                </div>
            @endforeach
            <button type="submit" class="btn btn-warning">Edit Rapor</button>
        </form>
    </div>
@endsection

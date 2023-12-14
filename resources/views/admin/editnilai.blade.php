@extends('layouts.main_admin')

@section('container')
    <!-- Page Heading -->

    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> EDIT NILAI
    </h1>
    </div>

    <div class="tablewali">
        <form action="{{ url('admin/listnilaisiswa/editnilai') }}" method="POST">
            @csrf
                <div class="form-group">
                    <label for="id">NILAI ID:</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $kode }}"
                        readonly>
                </div>
                <div class="form-group">
                    <label for="uh1">NILAI UH 1:</label>
                    <input type="number" class="form-control" id="uh1" name="uh1" required
                        value="{{ $nilai->ulha_1 }}">
                </div>
                <div class="form-group">
                    <label for="uh2">NILAI UH 2:</label>
                    <input type="number" class="form-control" id="uh2" name="uh2" required
                        value="{{ $nilai->ulha_2 }}">
                </div>
                <div class="form-group">
                    <label for="uts">NILAI UTS:</label>
                    <input type="number" class="form-control" id="uts" name="uts" required
                        value="{{ $nilai->uts }}">
                </div>
                <div class="form-group">
                    <label for="uh3">NILAI UH 3:</label>
                    <input type="number" class="form-control" id="uh3" name="uh3" required
                        value="{{ $nilai->ulha_3}}">
                </div>
                <div class="form-group">
                    <label for="uas">NILAI UAS:</label>
                    <input type="number" class="form-control" id="uas" name="uas" required
                        value="{{ $nilai->uas }}">
                </div>
                <button type="submit" class="btn btn-warning">Edit Nilai</button>
        </form>
    </div>
@endsection

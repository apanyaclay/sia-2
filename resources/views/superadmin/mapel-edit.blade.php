@extends('layouts.main_superadmin')

@section('container')
    <!-- Page Heading -->
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> EDIT MATA
        PELAJARAN</h1>
    </div>
    <br>
    <div class="tablewali">
        <form action="{{ url('superadmin/mapel/edit') }}" method="POST">
            @csrf
            <input type="text" hidden value="{{$data->id}}" id="id" name="id" required>
            <div class="form-group">
                <label for="name">Mapel:</label>
                <input type="text" class="form-control" id="name" name="name" required value="{{$data->nama_mapel}}">
            </div>
            <div class="form-group">
                <label for="kkm">KKM:</label>
                <input type="text" class="form-control" id="kkm" name="kkm" required value="{{$data->kkm}}">
            </div>
            <div class="form-group">
                <label for="guru">Guru:</label>
                <select name="guru" id="guru" class="form-control">
                    <option value="" disabled>-- Pilih Guru --</option>
                    @foreach ($guru as $item)
                        <option value="{{ $item->nuptk }}">{{ $item->nama_guru }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-warning">Edit Mapel</button>
        </form>
    </div>
@endsection

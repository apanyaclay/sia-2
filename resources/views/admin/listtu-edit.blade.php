@extends('layouts.main_admin')

@section('container')
    <!-- Page Heading -->
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> Edit
        Tata Usaha </h1>
    <div class="informasi py-3 px-5">
        <form action="{{ url('admin/listtu/edit') }}" method="POST">
            @csrf
            <table class="table mt-4">
                    <div class="form-group">
                        <tr>
                            <th><label for="id">ID Pegawai:</label></th>
                            <td><input type="text" id="id" name="id" required readonly
                                    value="{{ $data->id_pegawai }}"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <th><label for="nama">Nama:</label></th>
                            <td><input type="text" id="nama" name="nama" required
                                    value="{{ $data->nama_pegawai }}"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <th><label for="jk">Jenis Kelamin:</label></th>
                            <td><select name="jk" id="jk">
                                    <option value="">-- Silahkan Pilih --</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select></td>
                        </tr>
                    </div>

                    <div class="form-group">
                        <tr>
                            <th><label for="tempat">Tempat Lahir:</label></th>
                            <td><input type="text" id="tempat" name="tempat" required
                                    value="{{ $data->tempat_lahir }}"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <th><label for="tanggal">Tanggal Lahir:</label></th>
                            <td><input type="date" id="tanggal" name="tanggal" required
                                    value="{{ $data->tanggal_lahir }}"></td>
                        </tr>
                    </div>
                    <div class="form-group">
                        <tr>
                            <th><label for="jp">Jenjang Pendidikan:</label></th>
                            <td><input type="text" id="jp" name="jp" required
                                    value="{{ $data->jenjang_pendidikan }}"></td>
                        </tr>
                    </div>
            </table>
            <button type="submit" class="btn btn-warning">Edit</button>
        </form>
    </div>
    </div>
@endsection

@extends('layouts.main_guru')

@section('container')
    <!-- Page Heading -->
    <div class="isi ">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> SETTING
            &nbsp; AKUN</h1>
    </div>

    <div class="informasi py-3 px-3">

        <form action="{{ url('guru/akun/edit') }}" method="POST">
            @csrf
            <table class="table  mt-4">
                <tr>
                    <th>PASSWORD LAMA</th>
                    <td><input type="text" name="old" id="old" required></td>
                </tr>
                <tr>
                    <th>PASSWORD BARU</th>
                    <td><input type="text" name="new" id="new" required></td>
                </tr>
                <tr>
                    <th>KONFIRMASI PASSWORD BARU</th>
                    <td><input type="text" name="new_pas" id="new_pas" required></td>
                </tr>
            </table>
            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </form>
    </div>
@endsection

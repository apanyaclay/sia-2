@extends('layouts.main_siswa')


@section('container')
    <!-- Page Heading -->
    <div class="isi">
        <h1 class="jadwal h3 mb-0 text-gray-800"
            style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> EDIT &nbsp;
            PROFILE</h1>
    </div>

    <div class="informasi py-3 px-3">

        <form action="{{ url('siswa/profile/edit') }}" method="POST">
            @csrf
            <table class="table  mt-4"s>
                <tr>
                    <th>Nama</th>
                    <td><input type="text" id="nama" name="nama" required value="{{ $data->nama_siswa }}"></td>
                </tr>
                <tr>
                    <th>NIS/NISN</th>
                    <td><input type="text" id="nis" name="nis" required value="{{ $data->nisn }}" readonly>
                    </td>
                </tr>
                <tr>
                    <th>Tempat Lahir</th>
                    <td><input type="text" id="tempat" name="tempat" required value="{{ $data->tempat_lahir }}">
                    </td>
                </tr>
                <tr>
                    <th>Tanggal Lahir</th>
                    <td><input type="date" id="tanggal" name="tanggal" required value="{{ $data->tanggal_lahir }}">
                    </td>
                </tr>
                <tr>
                    <th>Jenis Kelamin</th>
                    <td><select name="jk" id="jk" required>
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="L">LAKI-LAKI</option>
                            <option value="P">PEREMPUAN</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Agama</th>
                    <td><select name="agama" id="agama" required>
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katholik">Katholik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                            <option value="Islam">Islam</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Status dalam Keluarga</th>
                    <td><select name="sk" id="sk" required>
                            <option value="">-- Silahkan Pilih --</option>
                            <option value="Anak Kandung">Anak Kandung</option>
                            <option value="Anak Tiri">Anak Tiri</option>
                        </select></td>
                </tr>
                <tr>
                    <th>Anak Ke</th>
                    <td><input type="number" id="ak" name="ak" required value="{{ $data->anak_ke }}"></td>
                </tr>
                <tr>
                    <th>Alamat Peserta Didik</th>
                    <td><input type="text" id="ap" name="ap" required value="{{ $data->alamat }}"></td>
                </tr>
                <tr>
                    <th>Nomor Telepon Rumah</th>
                    <td><input type="text" id="tl" name="tl" required value="{{ $data->no_hp }}"></td>
                </tr>
                <tr>
                    <th>Sekolah Asal</th>
                    <td><input type="text" id="sa" name="sa" required value="{{ $data->sekolah_asal }}">
                    </td>
                </tr>
                <tr>
                    <th>Nama Orang Tua</th>
                </tr>
                <tr>
                    <th>a. Ayah</th>
                    <td><input type="text" id="nay" name="nay" required value="{{ $data->nama_ayah }}">
                    </td>
                </tr>
                <tr>
                    <th>b. Ibu</th>
                    <td><input type="text" id="nib" name="nib" required value="{{ $data->nama_ibu }}">
                    </td>
                </tr>
                <tr>
                    <th>Alamat Orang Tua</th>
                    <td><input type="text" id="aot" name="aot" required value="{{ $data->alamat }}"></td>
                </tr>
                <tr>
                    <th>Nomor Telepon Rumah</th>
                    <td><input type="text" id="ntr" name="ntr" required value="{{ $data->no_hp }}"></td>
                </tr>
                <tr>
                    <th>Pekerjaan Orang Tua</th>
                </tr>
                <tr>
                    <th>a. Ayah</th>
                    <td><input type="text" id="payah" name="payah" required value="{{ $data->pekerjaan_ayah }}">
                    </td>
                </tr>
                <tr>
                    <th>b. Ibu</th>
                    <td><input type="text" id="pibuh" name="pibuh" required value="{{ $data->pekerjaan_ibu }}">
                    </td>
                </tr>
            </table>
            <button type="submit" class="btn btn-warning">Simpan Perubahan</button>
        </form>
    </div>
    </div>
@endsection

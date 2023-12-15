@extends('layouts.main_superadmin')

@section('container')
    <!-- Page Heading -->
    <div class="edit text-sm-end"><a type="button" href="{{ url('superadmin/listtu/tambah') }}"
            class="btn btn-secondary mt-3 mb-3"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>Tambah Tata
            Usaha</a></div>
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> Daftar Tata
        Usaha </h1>
    </div>
    <div class="tablewali">
        <table class="table text-center table-bordered  mt-4"style="width:900px ;">
            <thead style="background-color: #748E63; color: #000;">
                <tr>
                    <th scope="col">ID Pegawai</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Jenjang Pendidikan</th>
                    <td>Detail Profile</td>
                    <td>Aksi</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id_pegawai }}</td>
                        <td>{{ $item->nama_pegawai }}</td>
                        <td>{{ $item->jenjang_pendidikan }}</td>
                        <td><a type="button" href="{{ url('superadmin/listtu/detail', $item->id_pegawai) }}"
                                class="btn btn-warning">Lihat Detail</a></td>
                        <td><a type="button" href="{{ url('superadmin/listtu/edit', $item->id_pegawai) }}"
                                class="btn btn-warning"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>
                                Edit</a>
                            <a type="button" href="" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-ekskulid="{{ $item->id_pegawai }}"><i
                                    class="fa-solid fa-delete-left" style="color: #ffffff;"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Daftar Tata Usaha</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah Anda Yakin Ingin Menghapus ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" id="hapusButton" data-bs-dismiss="modal">Hapus</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            // Menangkap ID ekstrakurikuler saat tombol hapus diklik
            $('.btn-warning[data-bs-target="#exampleModal"]').click(function() {
                var ekskulId = $(this).data('ekskulid');
                $('#hapusButton').attr('data-ekskulid', ekskulId);
            });

            // Mengirimkan permintaan hapus ketika tombol Hapus diklik di dalam modal
            $('#hapusButton').click(function() {
                var ekskulId = $(this).data('ekskulid');
                window.location.href = '/superadmin/listtu/delete/' + ekskulId;
            });
        });
    </script>
@endsection

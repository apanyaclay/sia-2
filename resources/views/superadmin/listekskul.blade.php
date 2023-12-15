@extends('layouts.main_superadmin')

@section('container')
    <!-- Page Heading -->
    <div class="edit text-sm-end"><a href="{{ url('superadmin/listekskul/tambah') }}" type="button"
            class="btn btn-secondary mt-3 mb-3"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i> Tambah
            Ekstrakurikuler</a></div>
    <h1 class="jadwal h3 mb-0 text-gray-800"
        style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> DAFTAR
        EKSTRAKURIKULER </h1>
    </div>
    <div class="tablewali">
        <table class="table text-center table-bordered  mt-4"style="width:950px ;">
            <thead style="background-color: #748E63; color: #000;">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NAMA EKSKUL</th>
                    <th scope="col">GURU EKSKUL</th>
                    <th scope="col">HARI</th>
                    <th scope="col">WAKTU MULAI</th>
                    <th scope="col">WAKTU SELESAI</th>
                    <th scope="col">AKSI</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($data as $ekskul)
                        <td>{{ $ekskul->id }}</td>
                        <td>{{ $ekskul->nama_ekskul }}</td>
                        <td>{{ $ekskul->nama_guru }}</td>
                        <td>{{ $ekskul->hari }}</td>
                        <td>{{ $ekskul->waktu_mulai }}</td>
                        <td>{{ $ekskul->waktu_selesai }}</td>
                        <td><a type="button" href="{{ url('superadmin/listekskul/edit', $ekskul->id) }}"
                                class="btn btn-warning"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i></a>
                            <a type="button" href="" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-ekskulid="{{ $ekskul->id }}"><i
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Daftar Ekstrakurikuler</h1>
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
                window.location.href = '/superadmin/listekskul/delete/' + ekskulId;
            });
        });
    </script>
@endsection

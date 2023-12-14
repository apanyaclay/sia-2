@extends('layouts.main_guru')

@section('container')
    <h1 class="jadwal h3 mb-0 text-gray-800" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> DAFTAR SISWA {{$kelas->nama_kelas}}</h1></div>
    <div class="tablewali">
       <table  class="table text-center table-bordered  mt-4"style="width:900px ;" >
         <thead style="background-color: #748E63; color: #000;" >
           <tr>
             <th scope="col">NO</th>
             <th scope="col">NISN</th>
             <th scope="col">NAMA</th>
             <th scope="col">DETAIL</th>
             <th scope="col">AKSI</th>
           </tr>
         </thead>
         
         <tbody >
          @for ($i = 0; $i < count($data); $i++)
          <tr>
            <th scope="row">{{$i+1}}</th>
            <th>{{$data[$i]->nisn}}</th>
            <td>{{$data[$i]->nama_siswa}}</td>
            <td><a type="button"  href="{{url('guru/rapor/listsiswa/detail', $data[$i]->nisn)}}"  class="btn btn-warning"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>Lihat Rapor</a>
            </td>
            <td>
              <a type="button"  href="{{url('guru/rapor/listsiswa/edit', $data[$i]->nisn)}}"  class="btn btn-warning"><i class="fa-solid fa-file-pen" style="color: #ffffff;"></i>Edit Rapor</a>
            </td>
          </tr>
          @endfor
         </tbody>
       </table>
       </div> 

@endsection
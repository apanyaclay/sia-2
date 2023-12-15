@extends('layouts.main_superadmin')

@section('container')
              <!-- Page Heading -->
              <h1 class="jadwal h3 mb-0 text-gray-800" style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif; text-align: center;"> LIST SISWA {{$kelas->nama_kelas}} </h1></div>
              <div class="tablewali">
                 <table  class="table text-center table-bordered  mt-4"style="width:900px ;" >
                   <thead style="background-color: #748E63; color: #000;" >
                     <tr>
                       <th scope="col">NISN</th>
                       <th scope="col">NAMA</th>
                       <th scope="col">DETAIL RAPOR</th>
                     </tr>
                   </thead>
                   
                   <tbody >
                    @foreach ($data as $item)
                      <tr>
                        <th scope="row">{{$item->nisn}}</th>
                        <td>{{$item->nama_siswa}}</td>
                        <td><a type="button"  href="{{url('superadmin/rapor/listsiswa/raporsiswa', $item->nisn)}}"  class="btn btn-warning"> Lihat Rapor</a></td>
                      </tr>
                    @endforeach
                   </tbody>
                 </table>
                 </div> 
             
@endsection
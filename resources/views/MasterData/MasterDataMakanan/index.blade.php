@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Makanan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahmakanan')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px"><center>No</center></th>
                            <th>Kategori</th>
                            <th>Nama Makanan</th>
                            <th><center>Harga</center></th>
                            <th><center>Foto</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                         @foreach($makanan as $m) 
                         <tr>
                             <td><center>{{$no++}}</center></td>
                             <td>{{$m->nama_kategori}}</td>
                             <td>{{$m->nama_makanan}}</td>
                             <td><center>@currency($m->harga)</center></td>
                             <td><center>
                                 <img src="{{asset('storage/'. $m->image)}}" width="150px">
                            </center></td>
                             <td><center>
                             {{-- <a href="/master-data/data-makanan/lihat/{{$m->id_makanan}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                             <a href="/master-data/data-makanan/ubah/{{$m->id_makanan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                             <a href="/master-data/data-makanan/hapus/{{$m->id_makanan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </center></td>
                         </tr>
                         @endforeach
                    </tbody>
                  
                </table>
            </div>
        </div>        
</section>
@endsection
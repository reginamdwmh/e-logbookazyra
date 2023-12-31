@extends('layouts.backend-admin.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Bahan
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahbahan')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px"><center>No</center></th>
                            <th>Nama</th>
                            <th><center>Harga</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                         @foreach($bahan as $b) 
                         <tr>
                             <td><center>{{ $no++}}</center></td>             
                             <td>{{$b->nama_bahan}}</td>
                             <td><center>@currency($b->harga) </center></td>
                             <td><center>
                            {{-- <a href="/master-data/data-bahan/lihat/{{$b->id_bahan}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> --}}
                             <a href="/master-data/data-bahan/ubah/{{$b->id_bahan}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                             <a href="/master-data/data-bahan/hapus/{{$b->id_bahan}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </center></td>                        
                         </tr>
             
                         @endforeach
                    </tbody>
                   
                </table>
            </div>
        </div>        
</section>
@endsection


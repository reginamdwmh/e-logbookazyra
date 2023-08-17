@extends('layouts.backend-dashboard.app')
@section('title')


@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Barang
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahbarang')}}" class="btn-btn-secondary" >  
                        <i class="fa fa-edit"></i> Tambah Barang</a>
                        <br>
                    <a href="/barang/cetak" class="btn btn-primary" target="_blank">
                        <i class="fa fa-print"></i>Cetak</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($barang as $b) 
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$b->KD_BRG}}</td>
                            <td>{{$b->NM_BRG}}</td>
                            <td>{{$b->JENIS}}</td>
                            <td>{{$b->STOK}}</td>
                            <td>
                            <a href="/barang/ubah/{{$b->KD_BRG}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/barang/hapus/{{$b->KD_BRG}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
</section>
@endsection
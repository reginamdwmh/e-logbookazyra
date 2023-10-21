@extends('layouts.backend-dashboard.app')
@section('title')


@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Absen
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahabsen')}}" class="btn-btn-secondary" >  
                        <i class="fa fa-edit"></i> Tambah Absen</a>
                        <br>
                    <a href="/absen/cetak" class="btn btn-primary" target="_blank">
                        <i class="fa fa-print"></i>Cetak</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Keterangan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach($absen as $b) 
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$b->NIS}}</td>
                            <td>{{$b->keterangan}}</td>
                            <td>{{$b->tanggal}}</td>
                            <td>
                            <a href="/absen/ubah/{{$b->id}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/absen/hapus/{{$b->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div> 
</section>
@endsection
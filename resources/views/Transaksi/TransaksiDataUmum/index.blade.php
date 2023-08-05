@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Transaksi Umum
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahtransaksiumum')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px"><center>No</center></th>
                            <th>Nama Makanan</th>
                            <th><center>Harga<center></th>
                            <th><center>Penjualan<center></th>
                            <th><center>Mitra<center></th>
                            <th><center>Total Penjualan<center></th>
                            <th><center>Tanggal<center></th>
                            <th><center>Aksi<center></th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                        @foreach( $transaksi_umum as $tu) 
                        <tr>
                            <td><center>{{$no++}}</center></td>
                            <td>{{$tu->nama_makanan}}</td>
                            <td><center>@currency($tu->harga)</center></td>
                            <td><center>{{$tu->jumlah_penjualan}}</center></td>
            

                            {{-- <td><center>{{ $tu->mitra }}</center></td> --}}
                            <td><center>
                                <ul>
                                    @foreach ( $tu->get_transaksiumumdetail as $tud)
                                        <li>{{$tud->keterangan_pemesanan}} : {{$tud->jumlah_pemesanan}}</li>
                                    @endforeach
                                    
                                    
                                </ul>
                            </center></td>
                            
                            
                            <td><center>@currency($tu->total)</center></td>
                            <td><center>{{tanggal_indo(date('d-m-Y',strtotime($tu->created_at)))}}</center></td>
                            <td>
                            {{-- <a href="/transaksi/data-umum/lihat/{{$tu->id_umum}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>         --}}
                            <a href="/transaksi/data-umum/ubah/{{$tu->id_umum}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/transaksi/data-umum/hapus/{{$tu->id_umum}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </center></td>
                        </tr>
                        @endforeach
                    </tbody>
                   
                </table>
            </div>
        </div>        
</section>
@endsection
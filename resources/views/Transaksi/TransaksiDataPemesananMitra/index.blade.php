@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Data Transaksi Pemesanan Mitra
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive">
                <div>
                    <a href="{{route('tambahpemesananmitra')}}" class="btn-btn-primary">
                        <i class="fa fa-edit"></i> Tambah Data</a>
                </div>
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px"><center>No</center></th>
                            <th>Kode Pemesanan</th>
                            <th>Keterangan Pemesanan</th>
                            <th><center>Komisi</center></th>
                            <th><center>Pendapatan</center></th>
                            <th><center>Tanggal</center></th>
                            <th><center>Aksi</center></th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                        @foreach($transaksi_pemesanan_mitra as $index => $tpm) 
                        <tr>
                            <td><center>{{$no++}}</center></td>
                            <td>{{$tpm->kode_pemesanan}}</td>
                            <td>{{$tpm->keterangan_pemesanan}}</td>
                            <td><center>@currency($tpm->komisi)</center></td>
                            <td><center>@currency($tpm->total)</center></td>
                            <td><center>{{tanggal_indo(date('d-m-Y',strtotime($tpm->created_at)))}}</center></td>
                            <td><center>
                            <a href="/transaksi/data-pemesanan-mitra/lihat/{{$tpm->id_mitra}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                            <a href="/transaksi/data-pemesanan-mitra/ubah/{{$tpm->id_mitra}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                            <a href="/transaksi/data-pemesanan-mitra/hapus/{{$tpm->id_mitra}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </center></td>
                        </tr>
                        @endforeach
                    </tbody>
                  
                </table>
            </div>
        </div>        
</section>

@endsection

{{-- @section('content')
<section class="content">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
    
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-table"></i>
                Data Transaksi Pemesanan Makanan
            </h5>
        </div>


        <div class="card-body">
            <div class="table-responsive">     
            
           
            
            <form action="/transaksi/data-pemesanan-online/cari" method="GET" class="row">
                  <div class="col">
                    <a class="btn btn-success" href="{{route('tambahpemesananonline')}}"><i class="fa fa-edit"></i>Tambah Data</a><br><br>
                  </div>
                  <div class="col">
                   
                  </div>
                  <div class="col">

                  </div>
                  <div class="col">
                    <input class="form-control" type="text" name="cari" value="{{ old('cari') }}" placeholder="Cari Pemesanan ..." value="{{ old('cari') }}">
                  </div>
                  <div class="col">
                     <input type="submit" value="Cari" class="btn btn-secondary btn-sm">
                     <a href="/transaksi/data-pemesanan-online"  class="btn btn-secondary btn-sm">Refresh</a>
                  </div>
            </form>
           
            <table id="example1" class="table table-bordered table-striped">
            <tr>
                <th>No</th>
                <th>Kode Pemesanan</th>
                <th>Keterangan Pemesanan</th>
                <th>Komisi</th>
                <th>Pendapatan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
            @foreach($transaksi_pemesanan_online as $index => $tpo) 
            <tr>
                <td>{{$index + $transaksi_pemesanan_online->firstItem()}}</td>
                <td>{{$tpo->kode_pemesanan}}</td>
                <td>{{$tpo->keterangan_pemesanan}}</td>
                <td>@currency($tpo->komisi)</td>
                <td>@currency($tpo->total)</td>
                <td>{{$tpo->created_at}}</td>
                <td>
                    <a href="/transaksi/data-pemesanan-online/lihat/{{$tpo->id_online}}" title="Lihat" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                <a href="/transaksi/data-pemesanan-online/ubah/{{$tpo->id_online}}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="/transaksi/data-pemesanan-online/hapus/{{$tpo->id_online}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            </table>
        </div>
        Current Page: {{ $transaksi_pemesanan_online->currentPage() }}<br>
        Jumlah Data: {{ $transaksi_pemesanan_online->total() }}<br>
        Data perhalaman: {{ $transaksi_pemesanan_online->perPage() }}<br>
        <br>
        {{ $transaksi_pemesanan_online->links() }}
    </div> 
    
</section>
@endsection --}}
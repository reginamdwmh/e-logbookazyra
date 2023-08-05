@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Laporan Data Transaksi Umum
            </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            
                
                <form action="#" method="GET" class="card">
                <div class="card-body">
                <div class="row">   
                    <div class="col-md-4">
                        <label for="label">Tanggal Awal</label>
                        <input type="date" name="tglawal" id="tglawal" class="form-control"><br>    
                    </div>
                    <div class="col-md-4">
                        <label for="label">Tanggal Akhir</label>
                        <input type="date" name="tglakhir" id="tglakhir" class="form-control">
                        
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="#" onclick="this.href='/laporan/data-umum/cetak/'+document.getElementById('tglawal').value +
                        '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-primary">
                        <i class="fa fa-print"></i>Cetak</a>
                    </div>   
                </div>    
                </div> 
              </form>

              <div class="table-responsive">
                <br>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="50px"><center>No</center></th>
                            <th>Nama Makanan</th>
                            <th><center>Harga</center></th>
                            <th><center>Penjualan</center></th>
                            <th><center>Mitra</center></th>
                            <th><center>Total Penjualan</center></th>
                            <th><center>Tanggal</center></th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                          @foreach($transaksi_umum as $tu) 
                          <tr>
                              <td><center>{{$no++}}</center></td>
                              <td>{{$tu->nama_makanan}}</td>
                              <td><center>@currency($tu->harga)</center></td>
                              <td><center>{{$tu->jumlah_penjualan}}</center></td>
                              <td><center>
                                <ul>
                                    @foreach ( $tu->get_transaksiumumdetail as $tud)
                                        <li>{{$tud->keterangan_pemesanan}} : {{$tud->jumlah_pemesanan}}</li>
                                    @endforeach
                                    
                            
                                </ul>
                            </center></td>
                              <td><center>@currency($tu->total)</center></td>
                              <td><center>{{tanggal_indo(date('d-m-Y',strtotime($tu->created_at)))}}</center></td>
                              
                          </tr>
                          @endforeach
              
                </table>
            </div>
        </div>        
</section>
@endsection
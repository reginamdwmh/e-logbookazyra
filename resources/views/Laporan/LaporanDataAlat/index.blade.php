@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa fa-table"></i> Laporan Data Transaksi Alat
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
                        <a href="#" onclick="this.href='/laporan/data-alat/cetak/'+document.getElementById('tglawal').value +
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
                            <th><center>Nama Alat</center></th>
                            <th><center>Harga</center></th>
                            <th><center>Jumlah</center></th>
                            <th><center>Total</center></th>
                            <th><center>Tanggal</center></th>
                        </tr>
                    
                    </thead>
                    <tbody>
                        
                        @php
                        $no = 1;
                        @endphp
                          @foreach($transaksi_alat as $tb) 
                          <tr>
                              <td><center>{{$no++}}</center></td>
                              <td>{{$tb->nama_alat}}</td>
                              <td><center>@currency($tb->harga)</center></td>
                              <td><center>{{$tb->jumlah}}</center></td>
                              <td><center>@currency($tb->total)</center></td>
                              <td><center>{{tanggal_indo(date('d-m-Y',strtotime($tb->created_at)))}}</center></td>
                              
                          </tr>
                          @endforeach
                   
                </table>
            </div>
        </div> 
                  
</section>
@endsection
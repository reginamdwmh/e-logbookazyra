@extends('layouts.backend-admin.app')
@section('title','Dashboard Admin')

@section('content')
<section class="content">
<center>
    <img src="{{ asset('assets/AdminLTE/dist/img/azyra.png')}}" width="150px" height="150px" /> <br>
    <font size="5" face="Helvetica">APLIKASI LOG BOOK PENJUALAN,GRAFIK BARANG TERLARIS DAN INVENTARIS BARANG PADA AZYRA SNACK N FOOD BANJARBARU</font><br>
</center>
<div class="card card-danger">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fa fa-book"></i> Profil UMKM Azyra
        </h3>
    </div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nama Usaha</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="AZYRA" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="Jl. Menatos Timur No.8 Banjarbaru Utara, Kalimantan Selatan 707114" readonly/>
                </div>
            </div>

        </div>
    </form>
</div>
</section>




@endsection

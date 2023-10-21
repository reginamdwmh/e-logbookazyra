@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Barang
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanbarang')}}">
              @csrf
              <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="NM_BRG" class="form-control" placeholder="Nama Barang" required="">
              </div>
              <div class="form-group">
                <label>Jenis Barang</label>
                <input type="text" name="JENIS" class="form-control" placeholder="Jenis Barang" required="">
              </div>
              <div class="form-group">
                <label>Stok</label>
                <input type="number" name="STOK" class="form-control" placeholder="Stok Barang" required="">
              </div>
              <div class="form-group text-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan Data</button>
              </div>
            </form>
        </table>
    </div>
  </div>
</div>
</section>
@endsection
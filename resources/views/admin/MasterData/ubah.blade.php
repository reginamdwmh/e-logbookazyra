@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Barang
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($barang as $b)
              <form method="post" action="{{route('updatebarang')}}">
                @csrf
                <input type="hidden" name="KD_BRG" value="{{$b->KD_BRG}}">
                <div class="form-group">
                  <label>Nama Barang</label>
                  <input type="text" name="NM_BRG" value="{{$b->NM_BRG}}" class="form-control" placeholder="Nama Barang" required="">
                </div>
                <div class="form-group">
                  <label>Jenis Barang</label>
                  <input type="text" name="JENIS" value="{{$b->JENIS}}" class="form-control" placeholder="Jenis Barang" required="">
                </div>
                <div class="form-group">
                  <label>Stok</label>
                  <input type="number" name="STOK" value="{{$b->STOK}}" class="form-control" placeholder="STOK" required="">

                </div>
      
                <div class="form-group text-right">
                  <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update Data</button>
                </div>
              </form>
            @endforeach
          </table>
          </div>
        </div>
    </div>
 </section>


@endsection


@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
                <i class="fa fa-edit"></i>
                Tambah Data Absen
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <form method="post" action="{{route('simpanabsen')}}">
              @csrf
              <div class="form-group">
                <label>NIS</label>
                <input type="text" name="NIS" class="form-control" placeholder="NIS" required="">
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <select name="keterangan" id="keterangan" class="form-control">
                    <option>- Pilih -</option>
                    <option>Hadir</option>
                    <option>Iziin</option>
                    <option>Alpha</option>
                </select>
            </div>
              <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required="">
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
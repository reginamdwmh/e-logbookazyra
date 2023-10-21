@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
<section class="content">
    <div class="card card-danger">
        <div class="card-header">
            <h5 class="card-title">
              <i class="fa fa-edit"></i>
              Ubah Data Absen
            </h5>
        </div>
        <div class="card-body">
          <div class="table-responsive">
          <table class="table table-bordered table-hover">
            @foreach($absen as $b)
              <form method="post" action="{{route('updateabsen')}}">
                @csrf
                <input type="hidden" name="id" value="{{$b->id}}">
                <div class="form-group">
                  <label>NIS</label>
                  <input type="text" name="NIS" value="{{$b->NIS}}" class="form-control" placeholder="NIS" required="">
                </div>
                <div class="form-group">
                  <label>Keterangan</label>
                  <select name="keterangan" id="keterangan" class="form-control">
                    <option>- Pilih -</option>                 
                    @if( $b->keterangan == "Hadir") echo "<option value='Hadir' selected>Hadir</option>";
                    @else echo "<option value='Hadir'>Hadir</option>";
                    @endif
                    @if( $b->keterangan == "Izin") echo "<option value='Izin' selected>Izin</option>";
                    @else echo "<option value='Izin'>Izin</option>";
                    @endif
                    @if( $b->keterangan == "Alpha") echo "<option value='Alpha' selected>Alpha</option>";
                    @else echo "<option value='Alpha'>Alpha</option>";
                    @endif
                  </select>
                </div>
                <div class="form-group">
                  <label>Tanggal</label>
                  <input type="date" name="tanggal" value="{{$b->tanggal}}" class="form-control" placeholder="Tanggal" required="">

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


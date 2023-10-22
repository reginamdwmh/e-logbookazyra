@extends('layouts.backend-admin.app')
@section('title')


@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-table"></i> Laporan Shift Kas
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
                                <a href="#"
                                    onclick="this.href='/admin/laporan/shift-kas/cetak/'+document.getElementById('tglawal').value +
                        '/' + document.getElementById('tglakhir').value"
                                    target="_blank" class="btn btn-primary">
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
                                <th width="50px">
                                    <center>No</center>
                                </th>
                                <th>
                                    <center>Tanggal</center>
                                </th>
                                <th>User</th>
                                <th>
                                    <center>Jumlah</center>
                                </th>
                                <th>
                                    <center>Status</center>
                                </th>
                            </tr>

                        </thead>
                        <tbody>

                            @php
                                $no = 1;
                            @endphp
                            @foreach ($shift_kas as $sk)
                                <tr>
                                    <td>
                                        <center>{{ $no++ }}</center>
                                    </td>
                                    <td>
                                        <center>
                                            {{ tanggal_indo(date('d-m-Y', strtotime($sk->created_at))) }}&nbsp;{{ date('H:i', strtotime($sk->created_at)) }}
                                        </center>
                                    </td>
                                    @foreach ($users as $u)
                                        @if ($u->id == $sk->id_user)
                                            <td>{{ $u->name }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <center>@currency($sk->kas)</center>
                                    </td>
                                    <td>
                                        @if ($sk->kode_status == '1')
                                            <center>Awal Shift</center>
                                        @else
                                            <center>Akhir Shift</center>
                                        @endif
                                    </td>

                                </tr>
                            @endforeach

                    </table>
                </div>
            </div>
    </section>
@endsection

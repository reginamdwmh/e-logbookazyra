@extends('layouts.backend-admin.app')
@section('title')

@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-table"></i> Laporan Data Penjualan Online
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
                                    onclick="this.href='/admin/laporan/data-penjualan-online/cetak/'+document.getElementById('tglawal').value +
                        '/' + document.getElementById('tglakhir').value"
                                    target="_blank" class="btn btn-primary">
                                    <i class="fa fa-print"></i>Cetak</a>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="table-responsive">
                    <table id="example1" class="table table-bordered table-striped" style="margin-top:20px;">
                        <thead>
                            <tr>
                                <th width="50px">
                                    <center>No</center>
                                </th>
                                <th>Nama</th>
                                <th>
                                    <center>Tanggal</center>
                                </th>
                                <th>
                                    <center>Total</center>
                                </th>
                                <th>
                                    <center>Status</center>
                                </th>
                                <th>
                                    <center>Aksi</center>
                                </th>
                            </tr>

                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pesanan as $item)
                                <tr>
                                    <td>
                                        <center>{{ $no++ }}</center>
                                    </td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <center>{{ date('d M Y H:i', strtotime($item->tanggal)) }}</center>
                                    </td>
                                    <td>
                                        <center>@currency($item->total)</center>
                                    </td>
                                    @if ($item->status == 0)
                                        <td>
                                            <center><span class="badge badge-secondary">Belum Checkout</span></center>
                                        </td>
                                    @elseif($item->status == 1)
                                        <td>
                                            <center><span class="badge badge-primary">Checkout</span></center>
                                        </td>
                                    @elseif($item->status == 2)
                                        <td>
                                            <center><span class="badge badge-success">Konfirmasi</span></center>
                                        </td>
                                    @elseif($item->status == 4)
                                        <td>
                                            <center><span class="badge badge-warning">Selesai</span></center>
                                        </td>
                                    @else
                                        <td>
                                            <center><span class="badge badge-danger">Batal<br>Keterangan :
                                                    {{ $item->catatan }}</span></center>
                                        </td>
                                    @endif
                                    <td>
                                        <center>
                                            <a href="/admin/laporan/data-penjualan-online/detail/{{ $item->id_pesanan }}"
                                                title="Detail" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        </center>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
    </section>
@endsection

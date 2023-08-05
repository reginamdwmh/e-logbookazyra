@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-table"></i> Detail Penjualan Online
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (!empty($data_penjualan_detail))
                    <table class="table table-bordered table-striped">
                    </table>
                    <br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="margin-top:20px;">
                            <thead>
                                <tr>
                                    <th width="50px">
                                        <center>No</center>
                                    </th>
                                    <th>Nama</th>
                                    <th>
                                        <center>Jumlah</center>
                                    </th>
                                    <th>
                                        <center>Harga</center>
                                    </th>
                                    <th>Catatan</th>
                                    <th>
                                        <center>Total</center>
                                    </th>
                                </tr>

                            </thead>
                            <tbody>
                                @php
                                    
                                    $no = 1;
                                @endphp
                                @foreach ($data_penjualan_detail as $item)
                                    <tr>
                                        <td>
                                            <center>{{ $no++ }}</center>
                                        </td>
                                        <td>{{ $item->nama_makanan }}</td>
                                        <td>
                                            <center>{{ number_format($item->jumlah, 0, ',', '.') }}</center>
                                        </td>
                                        <td>
                                            <center>@currency($item->harga_satuan)</center>
                                        </td>
                                        <td>{{ $item->catatan }}</td>
                                        <td>
                                            <center>@currency($item->subtotal)</center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tr>
                                <td colspan="7">
                                    <div style="float:right;">
                                        <b>Grand Total : @currency($data_penjualan->total)</b>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td colspan="6">Tidak ada data penjualan detail</td>
                        </tr>
                    </table>
                @endif
            </div>

    </section>
@endsection

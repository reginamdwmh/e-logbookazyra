@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-table"></i> Detail Penjualan
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (!empty($data_penjualan_detail))
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td width="150" style="background-color:#fff;">
                                <div style="float:left;">
                                    <a href="/penjualan-saya/konfirmasi/{{ $data_penjualan->id_pesanan }}" class="btn btn-success">
                                        <i class="fa fa-check-circle"></i> Konfirmasi</a>
                                </div>
                            </td>
                            <td width="120" style="background-color:#fff;">
                                <div style="float:left;">
                                    <a href="/penjualan-saya/batal/{{ $data_penjualan->id_pesanan }}" class="btn btn-danger">
                                        <i class="fa fa-ban"></i> Batal</a>
                                </div>
                            </td>
                            <td colspan="5">
                                <div style="float:right;">
                                    <b>Grand Total :</b> @currency($data_penjualan->total)
                                </div>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="margin-top:20px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($data_penjualan_detail as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_makanan }}</td>
                                        <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                        <td>@currency($item->harga_satuan)</td>
                                        <td>@currency($item->subtotal)</td>
                                    </tr>
                                @endforeach
                            </tbody>

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

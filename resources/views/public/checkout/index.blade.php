@extends('layouts.backend-public.app')
@section('title')

@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-table"></i> Shopping Chart
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (!empty($pesanan))
                    <table class="table table-bordered table-striped">
                    </table>
                    <br>
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="margin-top:20px;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga</th>
                                    <th>Total</th>
                                    <th>Aksi</th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pesanan_detail as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->nama_makanan }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>@currency($item->harga_satuan)</td>
                                        <td>@currency($item->subtotal)</td>
                                        <td>
                                            <a href="#" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="/public/checkout/hapus/{{ $item->id }}"
                                                onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                                title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tr>
                                <td width="150" style="background-color:#fff;">
                                    <div style="float:left;">
                                        <a href="{{ route('confirm') }}" class="btn btn-primary">
                                            <i class="fas fa-shopping-cart"></i> Checkout</a>
                                    </div>
                                </td>
                                <td colspan="5">
                                    <div style="float:right;">
                                        <b>Grand Total :</b> @currency($pesanan->total)
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td colspan="6">Tidak ada data pembelian</td>
                        </tr>
                    </table>
                @endif
            </div>

    </section>
@endsection

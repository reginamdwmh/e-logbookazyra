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
                                    <th width="50px"><center>No</center></th>
                                    <th>Nama Barang</th>
                                    <th><center>Jumlah</center></th>
                                    <th><center>Harga</center></th>
                                    <th><center>Total</center></th>
                                    <th>Catatan Pembeli</th>
                                    <th><center>Aksi</center></th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pesanan_detail as $item)
                                    <tr>
                                        <td><center>{{ $no++ }}</center></td>
                                        <td>{{ $item->nama_makanan }}</td>
                                        <td><center>{{ $item->jumlah }}</center</td>
                                        <td><center>@currency($item->harga_satuan)</center</td>
                                        <td><center>@currency($item->subtotal)</center</td>
                                        <td>{{ $item->catatan }}</td>
                                        <td><center>
                                            <a href="/public/checkout/edit/{{ $item->id }}" title="Ubah" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="/public/checkout/hapus/{{ $item->id }}"
                                                onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                                title="Hapus" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                        </center</td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tr>
                                <td colspan="7">
                                    <div style="float:left;">
                                        <a href="{{ route('confirm') }}" class="btn btn-primary">
                                            <i class="fas fa-shopping-cart"></i> Checkout</a>
                                    </div>
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
                            <td colspan="7">Tidak ada data pembelian</td>
                        </tr>
                    </table>
                @endif
            </div>

    </section>
@endsection

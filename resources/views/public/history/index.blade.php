@extends('layouts.backend-public.app')
@section('title')

@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-table"></i> Riwayat Pesanan
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (!empty($pesanan))
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="margin-top:20px;">
                            <thead>
                                <tr>
                                    <th width="50px">
                                        <center>No</center>
                                    </th>
                                    <th>Nama Barang</th>
                                    <th>
                                        <center>Jumlah</center>
                                    </th>
                                    <th>
                                        <center>Harga</center>
                                    </th>
                                    <th>
                                        <center>Total</center>
                                    </th>
                                    <th>Catatan Pembeli</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Bukti Transfer</th>
                                    {{-- <th>
                                        <center>Aksi</center>
                                    </th> --}}
                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pesanan_detail as $item)
                                    <tr>
                                        <td>
                                            <center>{{ $no++ }}</center>
                                        </td>
                                        <td>{{ $item->nama_makanan }}</td>
                                        <td>
                                            <center>{{ $item->jumlah }}</center< /td>
                                        <td>
                                            <center>@currency($item->harga_satuan)</center< /td>
                                        <td>
                                            <center>@currency($item->subtotal)</center< /td>
                                        <td>{{ $item->catatan }}</td>
                                        @if ($item->jenis_pembayaran != '' || $item->jenis_pembayaran != null)
                                            <td>{{ $item->jenis_pembayaran }}</td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        @if ($item->image != '' || $item->image != null)
                                            <td><img src="{{ asset('storage/' . $item->image) }}"
                                                    class="rounded mx-auto d-block" width="100%"></td>
                                        @else
                                            <td>-</td>
                                        @endif
                                        {{-- <td>
                                            <center>
                                                <a href="" title="Ubah" class="btn btn-success btn-sm"><i
                                                        class="fa fa-edit"></i></a>
                                                </center< /td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                            <tr>
                                <td colspan="8">
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

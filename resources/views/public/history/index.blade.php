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
                @if (!empty($data_penjualan))
                    {{-- <table class="table table-bordered table-striped">
                    <tr>
                        <td width="120" style="background-color:#fff;">
                            <div style="float:left;">
                                <a href="{{ route('confirm') }}" class="btn-btn-primary">
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
                <br> --}}
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped" style="margin-top:20px;">
                            <thead>
                                <tr>
                                    <th width="50px">
                                        <center>No</center>
                                    </th>
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
                                @foreach ($data_penjualan as $item)
                                    <tr>
                                        <td>
                                            <center>{{ $no++ }}</center>
                                        </td>
                                        {{-- <td>{{ $item->name }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>
                                            <center>{{ $item->no_hp }}</center>
                                        </td> --}}
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
                                                <a href="/public/history/detail/{{ $item->id_pesanan }}" title="Detail"
                                                    class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>&nbsp;Detail</a>
                                                @if ($item->status == 2)
                                                    <a href="/public/history/selesai/{{ $item->id_pesanan }}"
                                                        title="Selesai" class="btn btn-success btn-sm"><i
                                                            class="fa fa-check"></i>&nbsp;Selesai</a>
                                                @endif
                                            </center>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                @else
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td colspan="6">Tidak ada data penjualan</td>
                        </tr>
                    </table>
                @endif
            </div>

    </section>
@endsection

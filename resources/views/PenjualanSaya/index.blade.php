@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-table"></i> Penjualan Saya
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
                                    <th width="50px"><center>No</center></th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th><center>No Hp</center></th>
                                    <th><center>Tanggal</center></th>
                                    <th><center>Total</center></th>
                                    <th><center>Aksi</center></th>
                                </tr>

                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($data_penjualan as $item)
                                    <tr>
                                        <td><center>{{ $no++ }}</center></td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td><center>{{ $item->no_hp }}</center></td>
                                        <td><center>{{ date('d M Y H:i', strtotime($item->tanggal)) }}</center></td>
                                        <td><center>@currency($item->total)</center></td>
                                        
                                        <td><center>
                                            <a href="/penjualan-saya/detail/{{ $item->id_pesanan }}" title="Detail"
                                                class="btn btn-primary btn-sm"><i class="fa fa-eye"></i></a>
                                        </center></td>
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

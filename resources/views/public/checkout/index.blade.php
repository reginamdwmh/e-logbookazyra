@extends('layouts.backend-public.app')
@section('title')

@section('content')
    <section class="content">
        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fa fa-table"></i> Keranjang Pesanan
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if (!empty($pesanan))
                    <form method="POST" action="{{ route('confirm') }}" enctype="multipart/form-data">
                        @csrf
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
                                        <th>
                                            <center>Aksi</center>
                                        </th>
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
                                            <td>
                                                <center>
                                                    <a href="/public/checkout/edit/{{ $item->id }}" title="Ubah"
                                                        class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                                                    <a href="/public/checkout/hapus/{{ $item->id }}"
                                                        onclick="return confirm('Apakah Anda Yakin Menghapus Data?');"
                                                        title="Hapus" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-trash"></i></a>
                                                    </center< /td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tr>
                                    <td style="background-color:#fff;" colspan="6">
                                    <select name="pembayaran" id="pembayaran" class="form-control" required>
                                        <option value="">-Pilih Jenis Pembayaran-</option>
                                        <option value="Transfer">Transfer</option>
                                        <option value="COD">COD</option>
                                    </select>
                                    </td>
                                    <td style="background-color:#fff; display: none;" id="image">
                                        <input type="file" name="image">
                                    </td>
                                </tr>
                                <tr>
                                    
                                    <td colspan="7">
                                        <div style="float:left; vertical-align: middle">
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="fas fa-shopping-cart"></i> Checkout</button>
                                        </div>
                                        <div style="float:right;">
                                            <b>Sub Total :</b> @currency($pesanan->total)
                                            <br>
                                            <b>Ongkir :</b> @currency(7000) <br><small style="color: red;">*) Ongkir berlaku di wilayah Banjarbaru</small>
                                            <br>
                                            <b>Grand Total :</b> @currency($pesanan->total + 7000)
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </form>
                @else
                    <table class="table table-bordered table-striped">
                        <tr>
                            <td colspan="7">Tidak ada data pembelian</td>
                        </tr>
                    </table>
                @endif
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
            <script type="text/javascript">
                $(document).ready(function() {

                    $('#pembayaran').change(function() {
                        var jenis = $(this).val();
                        if (jenis == 'Transfer') {
                            $('#image').show();
                        } else {
                            $('#image').hide();

                        }
                    })
                })
            </script>
    </section>
@endsection

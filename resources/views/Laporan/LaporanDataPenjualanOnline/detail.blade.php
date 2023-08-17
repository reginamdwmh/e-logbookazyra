@extends('layouts.backend-dashboard.app')
@section('title')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fa fa-table"></i> Detail Penjualan
                        </h3>
                    </div>


                    <!-- /.card-header -->
                    <div class="card-body">
                        @if (!empty($data_penjualan_detail))

                            <div class="card-body p-0">

                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>
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
                                            <th>Total</center>
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($data_penjualan_detail as $item)
                                            <tr>
                                                <td>
                                                    <center>{{ $no++ }}</center>
                                                </td>
                                                <td>{{ $item->nama_makanan }}</td>
                                                <td>
                                                    <center>{{ number_format($item->jumlah, 0, ',', '.') }}</center>
                                                </td>
                                                <td align="right">
                                                    <center>@currency($item->harga_satuan)</center>
                                                </td>
                                                <td>{{ $item->catatan }}</td>
                                                <td align="right">@currency($item->subtotal)</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>

            </div>
            <div class="col-md-4">
                <div class="card card-danger">
                    <div class="card-header">
                        <center>
                            <h3 class="card-title">
                                --- Pembayaran ---
                            </h3>
                        </center>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Jenis Pembayaran : </label>
                            @if ($item->jenis_pembayaran != '' || $item->jenis_pembayaran != null)
                                <td>{{ $item->jenis_pembayaran }}</td>
                            @else
                                <td>-</td>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Bukti Transfer : </label>
                            @if ($item->image != '' || $item->image != null)
                                <td><img data-toggle="modal" data-target="#detail_gambar" id="myImg"
                                        src="{{ asset('storage/' . $item->image) }}" class="rounded mx-auto d-block"
                                        width="150px"></td>
                            @else
                                <td>-</td>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped">
            <tr>
                <td colspan="5">
                    <div style="float:right;">
                        <b>Sub Total :</b> @currency($data_penjualan->total - 7000)
                        <br>
                        <b>Ongkir :</b> @currency(7000) <br><small style="color: red;">*) Ongkir berlaku di wilayah
                            Banjarbaru</small>
                        <br>
                        <b>Grand Total :</b> @currency($data_penjualan->total)
                    </div>
                </td>
            </tr>
        </table>
    @else
        <table class="table table-bordered table-striped">
            <tr>
                <td colspan="6">Tidak ada data penjualan detail</td>
            </tr>
        </table>
        @endif
        </div>

        <!-- Modal -->
        <div class="modal fade" id="batal_modal" tabindex="-1" aria-labelledby="batal_modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="batal_modalLabel">Form Batal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('/penjualan-saya/batal') }}/{{ $data_penjualan->id_pesanan }}">
                        @csrf
                        <div class="modal-body">
                            Alasan Batal
                            <textarea class="form-control" aria-label="With textarea" name="catatan" required></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger"><i class="fa fa-ban"></i> Konfirmasi
                                Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="detail_gambar" tabindex="-1" aria-labelledby="detail_gambarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="detail_gambarLabel">Detail Bukti Transfer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @foreach ($data_penjualan_detail as $item)
                            <img src="{{ asset('storage/' . $item->image) }}" class="rounded mx-auto d-block">
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById('myImg');
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                modalImg.alt = this.alt;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        </script>
    </section>



@endsection

@extends('layouts.backend-public.app')
@section('title')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="/public/" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $makanan->image) }}" class="rounded mx-auto d-block"
                                    width="100%">
                            </div>
                            <div class="col-md-6 mt-5">
                                <h2>{{ $makanan->nama_makanan }}</h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>@currency($makanan->harga)</td>
                                        </tr>
                                        <tr>
                                            <td>Stok Tersedia</td>
                                            <td>:</td>
                                            <td>{{ $stok[0]->stok }}</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $makanan->keterangan_kategori }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td>:</td>
                                            <td>
                                                <form method="post"
                                                    action="{{ url('/public/pesan/add_to_cart') }}/{{ $makanan->id_makanan }}">
                                                    @csrf
                                                    <input type="number" name="jumlah_pesanan" class="form-control"
                                                        required>

                                        <tr>
                                            <td>Catatan</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group">
                                                    <textarea class="form-control" aria-label="With textarea" name="catatan"></textarea>
                                                </div>
                                                <?php if(Auth::user()->alamat != '' || Auth::user()->alamat != null) : ?>
                                                <button type="submit" class="btn btn-primary mt-2"><i
                                                        class="fas fa-shopping-cart"></i> Masukan Keranjang</button>
                                                <?php else : ?>
                                                <a href="" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#updateModal"> <i class="fas fa-shopping-cart"></i> Jika
                                                    Ingin Membeli, Harap Lengkapi Data Diri Dulu</a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>



                                        </form>
                                        </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

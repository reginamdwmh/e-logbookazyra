@extends('layouts.backend-public.app')
@section('title')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <a href="/public/checkout" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-md-12 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{ asset('storage/' . $pesanan_detail[0]->image) }}"
                                    class="rounded mx-auto d-block" width="100%">
                            </div>
                            <div class="col-md-6 mt-5">
                                <h2>{{ $pesanan_detail[0]->nama_makanan }}</h2>
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Harga</td>
                                            <td>:</td>
                                            <td>@currency($pesanan_detail[0]->harga_satuan)</td>
                                        </tr>
                                        <tr>
                                            <td>Keterangan</td>
                                            <td>:</td>
                                            <td>{{ $pesanan_detail[0]->keterangan_kategori }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Pesanan</td>
                                            <td>:</td>
                                            <td>
                                                <form method="post" action="{{ route('update_to_cart') }}">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $pesanan_detail[0]->id }}">
                                                    <input type="number" name="jumlah_pesanan" class="form-control"
                                                        value="{{ $pesanan_detail[0]->jumlah }}" required>

                                        <tr>
                                            <td>Catatan</td>
                                            <td>:</td>
                                            <td>
                                                <div class="input-group">
                                                    <textarea class="form-control" aria-label="With textarea" name="catatan">{{ $pesanan_detail[0]->catatan }}</textarea>
                                                </div>
                                                <button type="submit" class="btn btn-success mt-2"><i
                                                        class="fas fa-shopping-cart"></i> Update Keranjang</button>
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

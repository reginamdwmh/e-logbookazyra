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
                            <img src="{{asset('storage/'. $makanan->image)}}" class="rounded mx-auto d-block" width="100%">
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
                                        <td>Keterangan</td>
                                        <td>:</td>
                                        <td></td>
                                    </tr>
                                    <form action="">
                                    <tr>
                                        <td>Jumlah Pesanan</td>
                                        <td>:</td>
                                        <td>
                                            <input type="number" name="jumlah_pesanan" class="form-control" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Masukan Chart</button>
                                        </td>
                                    </tr>
                                    </form>
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

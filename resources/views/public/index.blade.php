@extends('layouts.backend-public.app')
@section('title')

@section('content')
<section class="content">
    <div class="container">
        <div class="row justify-content-center">
            @foreach ($makanan as $m)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{asset('storage/'. $m->image)}}" class="card-img-top" alt="..." width="180px" height="200px">
                    <div class="card-body">
                    <h5 class="card-title">{{ $m->nama_makanan }}</h5>
                    <p class="card-text">@currency($m->harga)</p>
                    <a href="/public/pesan/{{ $m->id_makanan }}" class="btn btn-primary"> <i class="fas fa-shopping-cart"></i> Pesan</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

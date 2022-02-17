@extends('layouts.frontend')

@section('content')
<section class="bg0 p-t-23 p-b-130">
    <div class="container">
        <div class="p-b-10">
            <h3 class="ltext-103 cl5">
                Product Overview
            </h3>
        </div>

        <div class="py-5">
            <div class="container">
                <div class="row">
                    @foreach($pakaians as $data)
                    <div class="owl-carousel featured-carousel owl-theme">
                            <div class="item">
                                <div class="card">
                                    <a href="{{ url('category/'.$data->kategori->kategori_barang.'/'.$data->nama_pakaian) }}">
                                        <div class="card-body">
                                        <img src="{{$data->image()}}" alt="" style="width:320px; height:350px;" alt="Gambar">
                                        <h5>{{ $data->nama_pakaian }}</h5>
                                        <span class="float-start">Rp. {{ number_format($data->harga,2,".",".") }}</span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                </div>
            </div>
        </div>
</section>
@endsection

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
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach($pakaians as $data)
                            <div class="item">
                                <div class="card">
                                    <a href="{{ url('category/'.$data->nama_pakaian) }}">
                                    <img src="{{$data->image()}}" alt="" style="width:320px; height:350px;" alt="Gambar">
                                    <div class="card-body">
                                        <h5>{{ $data->nama_pakaian }}</h5>
                                        <span class="float-start">{{ $data->harga }}</span>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection

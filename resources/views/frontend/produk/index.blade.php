@extends('layouts.frontend')


@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-b-10">
                        <h3 class="ltext-103 cl5">
                            {{ $kategori->kategori_barang }}
                        </h3>
                    </div>

                    <div class="row">
                        @foreach ($pakaians as $data)
                            <div class="col-md-3 mb-3">
                                <div class="card">
                                    <a href="{{ url('category/'.$data->kategori->kategori_barang.'/'.$data->nama_pakaian) }}">
                                    <div class="card-body">
                                        <img src="{{ $data->image() }}" alt="" style="width:233px; height:320px;" alt="Gambar" alt="IMG-PRODUCT">
                                        <div class="card-body">
                                            <h5>{{ $data->nama_pakaian }}</h5>
                                            <span class="float-start">{{ $data->kategori->kategori_barang }}</span>
                                            <span class="float-start">{{ $data->harga }}</span>

                                        </div>
                                    </div>
                                </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
            </div>
        </div>
    </div>
@endsection
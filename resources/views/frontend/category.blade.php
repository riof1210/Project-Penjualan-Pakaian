@extends('layouts.frontend')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-b-10">
                        <h3 class="ltext-103 cl5">
                            All Category
                        </h3>
                    </div>
                    <div class="row">
                    @foreach ($kategori as $data)
                        <div class="col-md-4">
                            <a href="{{ url('category/'.$data->kategori_barang) }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                                        <h5>{{ $data->kategori_barang }}</h5>
                                        <p>
                                            {{ $data->deskripsi}}
                                        </p>
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
    </div>
@endsection

@extends('layouts.admin')
{{-- @section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Tambah Data Penulis</h1>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pembelian</div>
                    <div class="card-body">
                        <form action="{{ route('pembelians.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukan Nama Pelanggan</label>
                            <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror" >
                                @foreach($pelanggans as $data)
                                    <option value="{{$data->id}}">{{$data->nama}}</option>
                                @endforeach
                            </select>
                            @error('pelanggan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Total Pembeliann</label>
                            <select name="keranjang_id" class="form-control @error('keranjang_id') is-invalid @enderror" >
                                @foreach($keranjangs as $data)
                                    <option value="{{$data->id}}">{{$data->total_harga}}</option>
                                @endforeach
                            </select>
                            @error('keranjang_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Tanggal pembelian</label>
                            <input type="datetime" name="tgl_pembelian" class="form-control @error('tgl_pembelian') is-invalid @enderror">
                             @error('tgl_pembelian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Total Pembelian</label>
                            <input type="number" name="total_pembelian" class="form-control @error('total_pembelian') is-invalid @enderror">
                             @error('total_pembelian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="reset" class="btn btn-outline-warning">Reset</button>
                            <button type="submit" class="btn btn-outline-primary">Simpan</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
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
                    <div class="card-header">Data Stok</div>
                    <div class="card-body">
                        <form action="{{ route('stoks.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Masukan Nama Pakaian</label>
                            <select name="pakaian_id" class="form-control @error('pakaian_id') is-invalid @enderror" >
                                @foreach($pakaian as $data)
                                    <option value="{{$data->id}}">{{$data->nama_pakaian}}</option>
                                @endforeach
                            </select>
                            @error('pakaian_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Tanggal Stok</label>
                            <input type="date" name="tgl_stok" class="form-control @error('tgl_stok') is-invalid @enderror">
                             @error('tgl_stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Masukan Jumlah Stok</label>
                            <input type="number" name="qty_stok" class="form-control @error('qty_stok') is-invalid @enderror">
                             @error('qty_stok')
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

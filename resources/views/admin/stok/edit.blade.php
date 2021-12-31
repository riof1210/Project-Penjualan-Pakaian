@extends('layouts.admin')
{{-- @section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Edit Data Penulis</h1>
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
                        <form action="{{ route('stoks.update', $stok->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @method('put')
                <div class="form-group">
                    <label for="">Masukan Nama Pakaian</label>
                    <select name="pakaian_id" class="form-control @error('pakaian_id') is-invalid @enderror">
                        @foreach ($pakaians as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $stok->pakaian_id ? 'selected="selected"' : '' }}>{{ $data->nama_pakian }}</option>
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
                    <input type="date" name="tgl_stok" value="{{ $stok->tgl_stok }}" class="form-control @error('tgl_stok') is-invalid" @enderror>
                    @error('tgl_stok')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Jumlah stok</label>
                    <input type="number" name="qty_stok" value="{{ $stok->qty_stok }}" class="form-control @error('qty_stok') is-invalid" @enderror>
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

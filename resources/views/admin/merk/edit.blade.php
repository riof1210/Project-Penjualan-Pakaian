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
                    <div class="card-header">Data Merk</div>
                    <div class="card-body">
                        <form action="{{ route('merk.update', $merk->id) }}" method="post">
                        @csrf
                    @method('put')
                <div class="form-group">
                    <label for="">Masukan Nama Merk</label>
                    <input type="text" name="merk_barang" value="{{ $merk->merk_barang }}" class="form-control @error('merk_barang') is-invalid" @enderror>
                    @error('merk_barang')
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
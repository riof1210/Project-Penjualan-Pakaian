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
                    <div class="card-header">Data Supplier</div>
                    <div class="card-body">
                        <form action="{{ route('supplier.update', $supplier->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @method('put')
                <div class="form-group">
                    <label for="">Masukan Nama Supplier</label>
                    <input type="text" name="nama" value="{{ $supplier->nama }}" class="form-control @error('nama') is-invalid" @enderror>
                    @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Alamat Supplier</label>
                    <input type="text" name="alamat" value="{{ $supplier->alamat }}" class="form-control @error('alamat') is-invalid" @enderror>
                    @error('alamat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Nomor Telpon Supplier</label>
                    <input type="number" name="no_telp" value="{{ $supplier->no_telp }}" class="form-control @error('no_telp') is-invalid" @enderror>
                    @error('no_telp')
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
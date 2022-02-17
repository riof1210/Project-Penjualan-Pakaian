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
                    <div class="card-header">Data Pakaian</div>
                    <div class="card-body">
                        <form action="{{ route('pakaians.update', $pakaian->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Masukan Nama Pakaian</label>
                        <input type="text" name="nama_pakaian" value="{{ $pakaian->nama_pakaian }}" class="form-control @error('nama_pakaian') is-invalid" @enderror>
                        @error('nama_pakaian')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                <div class="form-group">
                    <label for="">Masukan Merk Pakaian</label>
                    <select name="merk_id" class="form-control @error('merk_id') is-invalid @enderror">
                        @foreach ($merk as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $pakaian->merk_id ? 'selected="selected"' : '' }}>{{ $data->merk_barang }}</option>
                    @endforeach
                </select>
                @error('merk_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Kategori Pakaian</label>
                    <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror">
                        @foreach ($kategori as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $pakaian->kategori_id ? 'selected="selected"' : '' }}>{{ $data->kategori_barang }}</option>
                    @endforeach
                </select>
                @error('pakaian_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Harga Pakaian</label>
                    <input type="text" name="harga" value="{{ $pakaian->harga }}" class="form-control @error('harga') is-invalid" @enderror>
                    @error('harga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Stok Pakaian</label>
                    <input type="text" name="qty" value="{{ $pakaian->qty }}" class="form-control @error('qty') is-invalid" @enderror>
                    @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Gambar Pakaian</label>
                    <br>
                    <img src="{{ $pakaian->image() }}" height="75" style="padding:10px;"/>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Masukan Deskripsi Pakaian</label>
                    <input type="text" name="deskripsi" value="{{ $pakaian->deskripsi }}" class="form-control @error('deskripsi') is-invalid" @enderror>
                    @error('deskripsi')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Supplier Pakaian</label>
                    <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                        @foreach ($supplier as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $pakaian->supplier_id ? 'selected="selected"' : '' }}>{{ $data->nama }}</option>
                    @endforeach
                </select>
                @error('supplier_id')
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
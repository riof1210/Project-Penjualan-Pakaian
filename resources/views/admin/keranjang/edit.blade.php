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
                    <div class="card-header">Data Keranjang</div>
                    <div class="card-body">
                        <form action="{{ route('keranjangs.update', $keranjang->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Masukan Nama Pelanggan</label>
                        <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror">
                            @foreach ($pelanggans as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $keranjang->pelanggan_id ? 'selected="selected"' : '' }}>{{ $data->nama }}</option>
                        @endforeach
                    </select>
                    @error('pelanggan_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                <div class="form-group">
                    <label for="">Masukan Nama Pakaian</label>
                    <select name="pakaian_id" class="form-control @error('pakaian_id') is-invalid @enderror">
                        @foreach ($pakaians as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $keranjang->pakaian_id ? 'selected="selected"' : '' }}>{{ $data->nama_pakaian }}</option>
                    @endforeach
                </select>
                @error('pakaian_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Tanggal keranjang</label>
                    <input type="datetime" name="tgl_keranjang" value="{{ $keranjang->tgl_keranjang }}" class="form-control @error('tgl_keranjang') is-invalid" @enderror>
                    @error('tgl_keranjang')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Jumlah Pakaian</label>
                    <input type="number" name="qty" value="{{ $keranjang->qty }}" class="form-control @error('qty') is-invalid" @enderror>
                    @error('qty')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Total Harga</label>
                    <input type="number" name="total_harga" value="{{ $keranjang->total_harga }}" class="form-control @error('total_harga') is-invalid" @enderror>
                    @error('total_harga')
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
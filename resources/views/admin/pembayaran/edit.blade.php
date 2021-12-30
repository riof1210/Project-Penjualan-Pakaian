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
                    <div class="card-header">Data Pembayaran</div>
                    <div class="card-body">
                        <form action="{{ route('pembayarans.update', $pembayaran->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @method('put')
                <div class="form-group">
                    <label for="">Masukan Nama Pelanggan</label>
                    <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror">
                        @foreach ($pelanggans as $data)
                        <option value="{{ $data->id }}" {{ $data->id == $pembayaran->pelanggan_id ? 'selected="selected"' : '' }}>{{ $data->nama }}</option>
                    @endforeach
                </select>
                @error('pelanggan_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Tanggal Pembayaran</label>
                    <input type="datetime" name="tgl_Pembayaran" value="{{ $pembayaran->tgl_bayar }}" class="form-control @error('tgl_bayar') is-invalid" @enderror>
                    @error('tgl_bayar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Total Pembayaran</label>
                    <input type="number" name="total" value="{{ $pembayaran->total }}" class="form-control @error('total') is-invalid" @enderror>
                    @error('total')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Masukan Metode Pembayaran</label>
                    <input type="text" name="metode" value="{{ $pembayaran->metode }}" class="form-control @error('metode') is-invalid" @enderror>
                    @error('metode')
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
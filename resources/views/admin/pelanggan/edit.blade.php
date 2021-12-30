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
                    <div class="card-header">Data Pelanggan</div>
                    <div class="card-body">
                        <form action="{{ route('pelanggans.update', $pelanggan->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Masukan Email Pelanggan</label>
                        <select name="user_id" class="form-control @error('user_id') is-invalid @enderror">
                            @foreach ($pelanggans as $data)
                            <option value="{{ $data->id }}" {{ $data->id == $pelanggan->user_id ? 'selected="selected"' : '' }}>{{ $data->email }}</option>
                        @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Nama Pelanggan</label>
                        <input type="text" name="nama" value="{{ $book->nama }}" class="form-control @error('nama') is-invalid @enderror">
                        @error('nama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Jenis Kelamin</label>
                        <input type="text" name="jk" value="{{ $pelanggan->jk }}" class="form-control @error('jk') is-invalid" @enderror>
                        @error('jk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Masukan Alamat</label>
                        <input type="text" name="alamat" value="{{ $book->alamat }}" class="form-control @error('alamat') is-invalid @enderror">
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Masukan no Telpon Pelanggan</label>
                        <input type="number" name="telp" value="{{ $pelanggan->telp }}" class="form-control @error('telp') is-invalid" @enderror>
                        @error('telp')
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
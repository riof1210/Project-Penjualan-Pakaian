@extends('layouts.admin')
{{-- @section('header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Show Data Penulis</h1>
                </div>
            </div>
        </div>
    </div>
@endsection --}}

@section('content')
    <div class="containter">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Data Pelanggan</div>
                    <div class="form-group">
                        <label for="">Email Pelanggan</label>
                        <input type="text" name="" value="{{ $pelanggan->user->email }}" class="form-control" readonly>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Pelanggan</label>
                            <input type="text" name="nama_pelanggan" value="{{ $pelanggan->nama }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin Pelanggan</label>
                            <input type="text" name="jk" value="{{ $pelanggan->jk }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Pelanggan</label>
                            <input type="text" name="alamat" value="{{ $pelanggan->alamat }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">No Telpon Pelanggan</label>
                            <input type="text" name="telp" value="{{ $pelanggan->telp }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin/pelanggans') }}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
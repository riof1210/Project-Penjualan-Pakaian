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
                    <div class="card-header">Data Supplier</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Supplier</label>
                            <input type="text" name="nama" value="{{ $supplier->nama }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat Supplier</label>
                            <input type="text" name="alamat" value="{{ $supplier->alamat }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telpon Supplier</label>
                            <input type="text" name="no_telp" value="{{ $supplier->no_telp }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin/supplier') }}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
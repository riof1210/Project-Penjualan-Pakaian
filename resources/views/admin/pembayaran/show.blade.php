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
                    <div class="card-header">Data Pembayaran</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama pelanggan</label>
                            <input type="text" name="" value="{{ $pembayaran->pelanggans->nama }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pembayaran</label>
                            <input type="datetime" name="tgl_pembayaran" value="{{ $pembayaran->tgl_pembayaran }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Total Pembayaran</label>
                            <input type="number" name="total" value="{{ $pembayaran->total }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Metode Pembayaran</label>
                            <input type="text" name="metode" value="{{ $pembayaran->metode }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin/pembayarans') }}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
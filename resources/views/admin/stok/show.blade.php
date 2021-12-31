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
                    <div class="card-header">Data Stok</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Pakaian</label>
                            <input type="text" name="" value="{{ $stok->pakaians->nama_pakaian }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Stok</label>
                            <input type="datetime" name="tgl_stok" value="{{ $stok->tgl_stok }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Stok</label>
                            <input type="number" name="qty_stok" value="{{ $stok->qty_stok }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin/stoks') }}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

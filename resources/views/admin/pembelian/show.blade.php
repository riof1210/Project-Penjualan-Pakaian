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
                    <div class="card-header">Data Pembelian</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Pelanggan</label>
                            <input type="text" name="" value="{{ $stok->pelanggans->nama }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">No Keranjang</label>
                            <input type="number" name="" value="{{ $stok->keranjangs->total_harga }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Tangal Pembelian</label>
                            <input type="datetime" name="tgl_pembelian" value="{{ $stok->tgl_pembelian }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Total Pembelian</label>
                            <input type="number" name="total_pembelian" value="{{ $stok->total_pembelian }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin/pembelians') }}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
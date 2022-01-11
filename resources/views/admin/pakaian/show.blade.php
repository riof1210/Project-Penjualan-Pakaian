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
                    <div class="card-header">Data pakaian</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nama Pakaian</label>
                            <input type="text" name="nama_pakaian" value="{{ $pakaian->nama_pakaian }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Merk Pakaian</label>
                            <input type="text" name="" value="{{ $pakaian->merk->merk_barang }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori Pakaian</label>
                            <input type="text" name="" value="{{ $pakaian->kategori->kategori_barang }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Harga Pakaian</label>
                            <input type="text" name="harga" value="{{ $pakaian->harga }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar Pakaian</label>
                            <br>
                            <img src="{{ $pakaian->image() }}" style="width: 350px; height: 350px; padding:10px" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Pakaian</label>
                            <input type="text" name="deskripsi" value="{{ $pakaian->deskripsi }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Supplier Pakaian</label>
                            <input type="text" name="" value="{{ $pakaian->supplier->nama }}" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <a href="{{ url('admin/pakaians') }}" class="btn btn-block btn-outline-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
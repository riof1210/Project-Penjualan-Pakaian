@extends('layouts.admin')
{{-- @section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Data Buku</h1>
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
                <div class="card-header">
                    Data Pakaian
                    <a href="{{route('pakaians.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Pakaian</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Pakaian</th>
                                <th>Merk Pakaian</th>
                                <th>Kategori Pakaian</th>
                                <th>Harga Pakaian</th>
                                <th>Gambar Pakaian</th>
                                <th>Deskripsi Pakaian</th>
                                <th>Supplier Pakaian</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            @php $no=1; @endphp
                            @foreach($pakaians as $data)
                            <tbody>
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->nama_pakaian}}</td>
                                <td>{{$data->merk->merk_barang}}</td>
                                <td>{{$data->kategori->kategori_barang}}</td>
                                <td>{{$data->harga}}</td>
                                <td><img src="{{$data->image()}}" alt="" style="width:150px; height:150px;" alt="Gambar"></td>
                                <td>{{$data->deskripsi}}</td>
                                <td>{{$data->supplier->nama}}</td>
                                <td>
                                    <form action="{{route('pakaians.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('pakaians.edit',$data->id)}}" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Edit</a>
                                        <a href="{{route('pakaians.show',$data->id)}}" class="btn waves-effect waves-light btn-rounded btn-outline-warning">Show</a>
                                        <button type="submit" class="btn waves-effect waves-light btn-rounded btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

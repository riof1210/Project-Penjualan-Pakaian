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
                    Data Stok
                    <a href="{{route('stok.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Stok</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Pakaian</th>
                                <th>Tanggal Stok</th>
                                <th>Jumlah Stok</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($stoks as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->pakaians->nama_pakaian}}</td>
                                <td>{{$data->tgl_stok}}</td>
                                <td>{{$data->qty_stok}}</td>
                                <td>
                                    <form action="{{route('stok.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('stok.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('stok.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Apakah anda yakin menghapus ini?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
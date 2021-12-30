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
                    Data Keranjang
                    <a href="{{route('keranjangs.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Keranjang</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Pakaian</th>
                                <th>Jumlah Pakaian</th>
                                <th>Total Harga</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($keranjangs as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->pelanggans->nama}}</td>
                                <td>{{$data->pakaians->nama_pakaian}}</td>
                                <td>{{$data->qty}}</td>
                                <td>{{$data->total_harga}}</td>
                                <td>
                                    <form action="{{route('keranjangs.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('keranjangs.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('keranjangs.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
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
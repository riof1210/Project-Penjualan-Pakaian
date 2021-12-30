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
                    Data Pembayaran
                    <a href="{{route('pembayarans.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Pembayaran</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Total Pembayaran</th>
                                <th>Metode Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($pembayarans as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->pelanggans->nama}}</td>
                                <td>{{$data->tgl_bayar}}</td>
                                <td>{{$data->total}}</td>
                                <td>{{$data->metode }}</td>
                                <td>
                                    <form action="{{route('pembayarans.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('pembayarans.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('pembayarans.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
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
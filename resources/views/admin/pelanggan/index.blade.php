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
                    Data Pelanggan
                    <a href="{{route('pelanggans.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Pelanggan</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Nomor</th>
                                <th>Email Pelanggan</th>
                                <th>Nama Pelanggan</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat Pelanggan</th>
                                <th>Nomor Telpon</th>
                                <th>Aksi</th>
                            </tr>
                            @php $no=1; @endphp
                            @foreach($pelanggans as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->email}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->jk}}</td>
                                <td>{{$data->alamat}}</td>
                                <td>{{$data->telp}}</td>
                                <td>
                                    <form action="{{route('pelanggans.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('pelanggans.edit',$data->id)}}" class="btn btn-outline-info">Edit</a>
                                        <a href="{{route('pelanggans.show',$data->id)}}" class="btn btn-outline-warning">Show</a>
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
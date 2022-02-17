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
@section('css')
    <link rel="stylesheet"  type="text/css" href="{{ asset('DataTables/datatables.css') }}">
@endsection
@section('js')
<script type="text/javascript" charset="utf8" src="{{ asset('DataTables/datatables.js') }}"></script>
<script>
    $(document).ready( function () {
    $('#merk').DataTable();
} );
</script>
<script src="{{ asset('js/sweetalert2.js') }}"></script>
<script src="{{asset('js/delete.js')}}"></script>

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Data Merk
                    <a href="{{route('merk.create')}}" class="btn btn-sm btn-outline-primary float-right">Tambah Merk Pakaian</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="merk" class="table">

                            <thead>
                            <tr>
                                <th>Nomor</th>
                                <th>Merk Pakaian</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $no=1; @endphp
                            @foreach($merk as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$data->merk_barang}}</td>
                                <td>
                                    <form action="{{route('merk.destroy',$data->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <a href="{{route('merk.edit',$data->id)}}" class="btn waves-effect waves-light btn-rounded btn-outline-primary">Edit</a>
                                        <a href="{{route('merk.show',$data->id)}}" class="btn waves-effect waves-light btn-rounded btn-outline-warning">Show</a>
                                        <button type="submit" class="btn btn-danger delete-confirm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                            <tfoot>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Merk Pakaian</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

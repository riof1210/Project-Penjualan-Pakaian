@extends('layouts.admin')


@section('header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h2 class="m-0">Admin Dashboard</h3>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
{{-- <div class="card-group">
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h2 class="text-dark mb-1 font-weight-medium">{{ $pakaians }}</h2>
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Pakaian</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium">{{ $kategori }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Kategori
                    </h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card border-right">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <div class="d-inline-flex align-items-center">
                        <h2 class="text-dark mb-1 font-weight-medium">{{ $merk }}</h2>
                        
                    </div>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Merk</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
                <div>
                    <h2 class="text-dark mb-1 font-weight-medium">{{ $supplier }}</h2>
                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Supplier</h6>
                </div>
                <div class="ml-auto mt-md-3 mt-lg-0">
                    <span class="opacity-7 text-muted"><i data-feather="globe"></i></span>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Admin Page</div>
                <div class="card-body">
                    <center>Selamat Datang Kembali <strong>@auth
                        <span class="text-black fw-bold">{{ Auth::user()->name }}</span>
                        @endauth</strong>
                        <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

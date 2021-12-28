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

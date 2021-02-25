@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="page-header-title">
            <h6>Dashboard</h6>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="">Dashboard</a></li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12 my-3">
            <div class="card">
                <div class="card-body text-center">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="page-header-title">
            <h5>Dashboard Analytics</h5>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard Analytics</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h5>New Announcement</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success w-75 mx-auto" role="alert">
                            <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                                {{ session('success') }}
                            </p>
                        </div>
                    @endif
                    <form action="{{ route('announcement.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="inputTitle">Τίτλος:</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title">
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="inputContent">Κείμενο:</label>
                            <textarea class="form-control @error('content') is-invalid @enderror" id="inputContent" name="content" rows="8"></textarea>
                            @error('content')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <div class="custom-file w-25">
                                <input type="file" class="custom-file-input @error('attachment') is-invalid @enderror" id="inputFile" name="attachment">
                                <label class="custom-file-label" for="inputFile">Choose file</label>
                                @error('attachment')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary">Υποβολή <i class="far fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
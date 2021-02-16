@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-header">
        <div class="page-header-title">
            <h5>Create Announcement</h5>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('announcement.create') }}">New Announcement</a></li>
            </ol>
        </nav>
    </div>
    <div class="card custom-admin-card">
        <div class="card-header">
            <h5>Νέα Ανακοίνωση</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('announcement.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inputTitle">Τίτλος:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputContent">Κείμενο:</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="inputContent" name="content" rows="8">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-5">
                    <div class="custom-file w-auto">
                        <input type="file" class="custom-file-input @error('attachment') is-invalid @enderror" id="inputFile" name="attachment">
                        <label class="custom-file-label" for="inputFile">Choose file</label>
                        @error('attachment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-sm btn-primary">Αποθήκευση <i class="far fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
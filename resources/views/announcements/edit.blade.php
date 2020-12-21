@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="page-header">
        <div class="page-header-title">
            <h5>Edit Announcement</h5>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Edit Announcement</a></li>
            </ol>
        </nav>
    </div>
    <div class="card">
        <div class="card-header">
            <h5>Update Announcement</h5>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success w-75 mx-auto" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            <form action="{{ route('announcement.update', $announcement->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="inputTitle">Τίτλος:</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="inputTitle" name="title" value="{{ old('title') ?? $announcement->title }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="inputContent">Κείμενο:</label>
                    <textarea class="form-control @error('content') is-invalid @enderror" id="inputContent" name="content" rows="8">{{ old('content') ?? $announcement->content }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group d-flex align-items-center mb-5">
                    <div class="custom-file w-50">
                        <input type="file" class="custom-file-input @error('attachment') is-invalid @enderror" id="inputFile" name="attachment">
                        <label class="custom-file-label" for="inputFile">Choose file</label>
                        @error('attachment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <a tabindex="0" class="ml-3" role="button" data-toggle="popover" data-trigger="focus" data-placement="right" title="File input info" data-content="Choose a new file to replace the old one in database.">
                        <i class="far fa-question-circle fa-lg"></i>
                    </a>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update <i class="far fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
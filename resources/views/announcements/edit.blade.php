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
    <div class="card custom-admin-card">
        <div class="card-header">
            <h5>Update Announcement</h5>
        </div>
        <div class="card-body">
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
                    <div class="custom-file w-auto">
                        <input type="file" class="custom-file-input @error('attachment') is-invalid @enderror" id="inputFile" name="attachment">
                        <label class="custom-file-label" for="inputFile">Choose file</label>
                        @error('attachment')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="button" class="btn ml-3 border-0 shadow-none" data-toggle="tooltip" data-placement="right" title="Αν επιλέξετε νέο συνημμένο, τυχόν προηγούμενο αποθηκευμένο θα αντικατασταθεί!">
                        <span class="text-info far fa-question-circle" style="font-size: 1.5em"></span>
                    </button>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Αποθήκευση <i class="fas fa-file-upload"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Ανακοινώσεις')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="page-header-title">
            <h6>Announcements Table</h6>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="">Announcements</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('announcements.index') }}">Announcements Table</a></li>
            </ol>
        </nav>
    </div>
    <div class="card custom-admin-card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success w-75 mx-auto text-center" role="alert">
                    <i class="fas fa-check-circle"></i> <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif
            @if ($announcements->isNotEmpty())
                <div class="table-responsive">
                    <table id="announcementsTable" class="table table-bordered custom-table">
                        <thead>
                            <tr>
                                <th scope="col">Προστέθηκε</th>
                                <th scope="col">Τίτλος</th>
                                <th scope="col">Επισύναψη</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement)
                                <tr>
                                    <td>{{ $announcement->updated_at->format('d/m/Y H:i') }}</td>
                                    <td><a class="text-primary" href="{{ route('announcement.show', $announcement->id) }}" target="_blank">{{ $announcement->title }}</a></td>
                                    <td>
                                        @if (Storage::disk('public')->exists($announcement->attachment))
                                            <a href="{{ Storage::url($announcement->attachment) }}" target="_blank">Προβολή</a>
                                            <a href="{{ route('announcements.download.file', $announcement->id) }}">Download</a>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-info mb-3 mb-xl-0" href="{{ route('announcement.edit', $announcement->id) }}">
                                            <i class="fas fa-pencil-alt fa-fw"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger ml-xl-3 deleteBtn" data-toggle="modal" data-target="#deleteAnnouncementModal" data-url="{{ route('announcement.destroy', $announcement->id) }}">
                                            <i class="far fa-trash-alt fa-fw"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 class="display-4 text-center">Δεν υπάρχουν αναρτημένες ανακοινώσεις!</h1>
            @endif
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteAnnouncementModal" tabindex="-1" role="dialog" aria-labelledby="deleteAnnouncementModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteAnnouncementModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to delete these records? This process cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="page-header-title">
            <h6>Πίνακας Ασκούμενων Φοιτητών</h6>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('graduates.index') }}">Πίνακας Ασκούμενων Φοιτητών</a></li>
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
            @if ($trainees->isNotEmpty())
                <div class="table-responsive">
                    <table id="traineesTable" class="table custom-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">Επώνυμο</th>
                                <th scope="col">Όνομα</th>
                                <th scope="col">Αριθμός Μητρώου</th>
                                <th scope="col">Εξάμηνο</th>
                                <th scope="col">Ακαδημαική Χρονιά</th>
                                <th scope="col">Επόπτης</th>
                                <th scope="col">Φορέας Απασχόλησης</th>
                                <th scope="col">Θέση Απασχόλησης</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($trainees as $trainee)
                                <tr>
                                    <td>{{ $trainee->lastname }}</td>
                                    <td>{{ $trainee->firstname }}</td>
                                    <td>{{ $trainee->am }}</td>
                                    <td>{{ $trainee->semester }}</td>
                                    <td>{{ $trainee->season }}</td>
                                    <td>{{ $trainee->supervisor }}</td>
                                    <td>{{ $trainee->company }}</td>
                                    <td>{{ $trainee->job }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-info mb-3 mb-xl-0" href="{{ route('trainee.edit', $trainee->id) }}">
                                            <i class="fas fa-pencil-alt fa-fw"></i> Edit
                                        </a>
                                        <button type="button" class="btn btn-sm btn-outline-danger ml-xl-3 deleteBtn" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('trainee.destroy', $trainee->id) }}">
                                            <i class="far fa-trash-alt fa-fw"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 class="display-4 text-center">There are no trainees in database!</h1>
            @endif
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
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
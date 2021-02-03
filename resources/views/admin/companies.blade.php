@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="page-header-title">
            <h6>Companies Table</h6>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item" aria-current="page"><a href="">Companies</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('companies.index') }}">Companies Table</a></li>
            </ol>
        </nav>
    </div>
    <div class="card custom-admin-card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            @if ($companies->isNotEmpty())
                <div class="table-responsive">
                    <table id="companiesTable" class="table table-bordered custom-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Επωνυμία</th>
                                <th scope="col">Τομέας</th>
                                <th scope="col">Τοποθεσία</th>
                                <th scope="col">Στοιχεία εταιρείας</th>
                                <th scope="col">Αποδοχή/Απόρριψη</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->sector }}</td>
                                    <td>{{ $company->location }}</td>
                                    <td><a href="{{ route('companies.show', $company->id) }}" target="_blank">Προβολή</a></td>
                                    <td>
                                        @if ($company->status == 'pending')
                                            <div class="d-flex justify-content-between justify-content-lg-around">
                                                <form action="{{ route('company.update', $company->id) }}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-outline-success" name="status" value="approved">
                                                        <i class="fas fa-check fa-fw"></i> Accept
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-sm btn-outline-danger deleteBtn" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('company.destroy', $company) }}">
                                                    <i class="fas fa-times fa-fw"></i> Reject
                                                </button>
                                            </div>
                                        @else
                                            <button type="button" class="btn btn-sm btn-outline-danger deleteBtn" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('company.destroy', $company) }}">
                                                <i class="fas fa-times fa-fw"></i> Delete
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <h1 class="display-4 text-center">Δεν υπάρχουν καταχωρημένοι φορείς απασχόλησης!</h1>
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
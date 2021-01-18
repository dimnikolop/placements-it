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
                                <th scope="col">Στοιχεία εταιρείας</th>
                                <th scope="col">Θέσεις Απασχόλησης</th>
                                <th scope="col">Έγκριση/Απόρριψη</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->sector }}</td>
                                    <td><a href="{{ route('companies.show', $company->id) }}">Προβολή</a></td>
                                    <td><a href="">Προβολή</a></td>
                                    <td class="d-flex justify-content-around">
                                        @if ($company->status == 'pending')
                                            <form action="{{ route('company.update', $company->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success" name="status" value="approved"><i class="fas fa-check fa-fw"></i></button>
                                            </form>
                                        @endif
                                        <button type="submit" class="btn btn-danger" data-toggle="modal" data-target="#deleteCompanyModal"><i class="fas fa-times fa-fw"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Delete Modal-->
                <div class="modal fade" id="deleteCompanyModal" tabindex="-1" role="dialog" aria-labelledby="deleteCompanyModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteCompanyModalLabel">Are you sure?</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Do you really want to delete these records? This process cannot be undone.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <form action="{{ route('company.destroy', $company->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h1 class="display-4 text-center">Δεν υπάρχουν καταχωρημένοι φορείς απασχόλησης!</h1>
            @endif
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Φορείς Απασχόλησης')

@section('content')
<div class="container">
    <div class="card custom-main-card">
        <div class="card-body">
            @if ($companies->isNotEmpty())
                <div class="table-responsive">
                    <table id="companiesTable" class="table table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Επωνυμία</th>
                                <th scope="col">Τομέας</th>
                                <th scope="col">Τοποθεσία</th>
                                <th scope="col">Στοιχεία εταιρείας</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($companies as $company)
                                <tr>
                                    <td>{{ $company->name }}</td>
                                    <td>{{ $company->sector }}</td>
                                    <td>{{ $company->location }}</td>
                                    <td><a href="{{ route('companies.show', $company->id) }}">Προβολή</a></td>
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
@endsection
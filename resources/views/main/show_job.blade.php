@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-none">
                <div class="card-header">
                    <div class="media">
                        <img src="{{ asset('img/company-1-45x45.png') }}" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $job->title }}</h5>
                            <div class="d-flex mb-3">
                                <div class="mr-3"><strong>Φορέας:</strong> <span class="text-muted">{{ $company->name }}</span></div>
                                <div class=""><strong>Δημοσιεύτηκε:</strong> <span class="text-muted">{{ $job->created_at->format("jS F Y") }}</span></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title heading-decorated_1">Περιγραφή Θέσης</h5>
                    <p class="card-text">{{ $job->description }}</p>
                    <h5 class="card-title heading-decorated_1">Απαιτήσεις</h5>
                    <p class="card-text">{{ $job->requirements }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6>Επικοινωνία</h6>
                </div>
                <div class="card-body">
                    <p><i class="fas fa-map-marker-alt fa-fw"></i> {{ $company->address }}, {{ $company->zip_code }}, {{ $company->location }}</p>
                    <p><i class="fas fa-phone-alt fa-fw"></i> {{ $company->phone }}</p>
                    <p><i class="far fa-envelope fa-fw"></i> {{ $company->email }}</p>
                    <p><dt>Υπεύθυνος επικοινωνίας:</dt><dd>{{ $company->contact_person }}</dd></p>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
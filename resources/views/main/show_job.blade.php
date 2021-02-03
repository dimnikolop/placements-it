@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-header px-0">
                    <h4 class="mb-3">{{ $job->title }}</h4>
                    <div class="d-flex">
                        <div class="mr-3"><span class="font-weight-bold">Φορέας:</span> <span class="text-muted">{{ $company->name }}</span></div>
                        <div><span class="font-weight-bold">Δημοσιεύτηκε:</span> <span class="text-muted">{{ $job->created_at->format("jS F Y") }}</span></div>
                    </div>
                </div>
                <div class="card-body px-0">
                    <h5 class="card-title heading-decorated_1">Περιγραφή Θέσης</h5>
                    <p class="card-text">{{ $job->description }}</p>
                    <h5 class="card-title heading-decorated_1">Απαιτήσεις</h5>
                    <p class="card-text">{{ $job->requirements }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card custom-main-card sticky-top">
                <div class="card-header font-weight-bold">Επικοινωνία</div>
                <div class="card-body">
                    <p><i class="fas fa-map-marker-alt fa-fw"></i> {{ $company->address }}, {{ $company->zip_code }}, {{ $company->location }}</p>
                    <p><i class="fas fa-phone-alt fa-fw"></i> {{ $company->phone }}</p>
                    <p><i class="far fa-envelope fa-fw"></i> {{ $company->email }}</p>
                    <p><dt class="font-weight-bold">Υπεύθυνος επικοινωνίας:</dt><dd>{{ $company->contact_person }}</dd></p>
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card border-0 shadow-none">
                <div class="card-header">
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="media">
                                <img src="{{ asset('img/company-1-45x45.png') }}" class="mr-3" alt="...">
                                <div class="media-body">
                                    <h5 class="mt-0">{{ $company->name }}</h5>
                                    <p class="text-secondary">{{ $company->sector }}</p>
                                    <p class="small"><i class="far fa-file-alt"></i> 3 ανοιχτές θέσεις</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 border-left my-auto text-center">
                            <div class="social-info">
                                <div class="social-media">
                                    <ul class="list-inline">
                                        <li class="list-inline-item"><a href="#" class="facebook-icon" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="twitter-icon" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="#" class="linkedin-icon" title="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                <a class="site-link text-secondary" href="{{ $company->website }}">{{ Str::after($company->website, 'https://') }}</a>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="card-body">
                    <h5 class="card-title heading-decorated_1">Σχετικά με την εταιρεία</h5>
                    <p class="card-text">{{ $company->description }}</p>
                    <h5 class="card-title heading-decorated_1">Επιπλέον Πληροφορίες - Σημειώσεις / Σχόλια</h5>
                    <p class="card-text">{{ $company->notes }}</p>
                    
                    <h5 class="card-title heading-decorated_1">Θέσεις Απασχόλησης</h5>
                    <div class="list-group">
                        @foreach ($jobs as $job)
                            <a href="{{ route('companies.jobs.show', [$company, $job]) }}" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $job->title }}</h5>
                                    <small class="text-muted">{{ $job->created_at->diffForHumans() }}</small>
                                </div>
                                <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus
                                    varius blandit.
                                </p>
                                <small class="text-muted">Donec id elit non mi porta.</small>
                            </a>
                        @endforeach
                    </div>
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
@extends('layouts.app')

@section('content')
<div id="companyDisplay" class="container">
    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0">
                <div class="card-header bg-white px-0">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>{{ $company->name }}</h4>
                            <p class="text-secondary">{{ $company->sector }}</p>
                            <p class="small"><i class="far fa-file-alt mr-2" style="color: #1087eb;"></i> {{ $jobs->count() > 0 ? $jobs->count() . ' ανοιχτές θέσεις' : 'Δεν υπάρχουν ανοιχτές θέσεις' }}</p>
                        </div>
                        <div class="col-md-4 mb-3 my-md-auto text-center">
                            <div class="social-info d-flex flex-md-column">
                                <div class="social-media">
                                    <ul class="list-inline mb-0">
                                        <li class="list-inline-item"><a href="{{ $company->facebook }}" class="facebook-icon" title="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="{{ $company->twitter }}" class="twitter-icon" title="Twitter" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="{{ $company->linkedin }}" class="linkedin-icon" title="LinkedIn" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                    </ul>
                                </div>
                                @if (!empty($company->website))
                                    <a class="ml-4 ml-md-0 mt-md-3 align-self-center" href="{{ $company->website }}">{{ Str::after($company->website, 'https://') }}</a>
                                @endif
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="card-body px-0 pt-4">
                    <h5 class="card-title heading-decorated_1">Σχετικά με την εταιρεία</h5>
                    <p class="card-text mb-5">{!! nl2br(e($company->description)) !!}</p>
                    @if (!empty($company->notes))
                        <h5 class="card-title heading-decorated_1">Επιπλέον Πληροφορίες</h5>
                        <p class="card-text mb-5">{{ $company->notes }}</p>
                    @endif
                    @if ($jobs->isNotEmpty())
                        <h5 class="card-title heading-decorated_1 mb-3">Θέσεις Απασχόλησης</h5>
                        <div class="list-group">
                            @foreach ($jobs as $job)
                                <a href="{{ route('companies.jobs.show', [$company, $job]) }}" class="list-group-item list-group-item-action">
                                    <div class="d-flex w-100 justify-content-between mb-3">
                                        <h5 class="mb-1">{{ $job->title }}</h5>
                                        <small class="text-muted">{{ $job->created_at->diffForHumans() }}</small>
                                    </div>
                                    <p class="mb-1">{{ Str::words($job->description, 20, '...') }}</p>
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card custom-main-card sticky-top">
                <div class="card-header font-weight-bold bg-white">Επικοινωνία</div>
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
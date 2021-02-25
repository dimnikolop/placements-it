@extends('layouts.admin')

@section('title', 'Επεξεργασία Ασκούμενου')

@section('content')
<div class="container">
    <div class="page-header">
        <div class="page-header-title">
            <h5>Edit Trainee</h5>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="">Edit Trainee</a></li>
            </ol>
        </nav>
    </div>
    <div class="card custom-admin-card">
        <div class="card-header">
            <h5>Επεξεργασία ασκούμενου φοιτητή</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('trainee.update', $trainee->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-row mb-4">
                    <div class="form-group col-md-5">
                        <label for="inputFirstname">Όνομα</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="inputFirstname" name="firstname" value="{{ old('firstname') ?? $trainee->firstname }}">
                        @error('firstname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-5">
                        <label for="inputLastname">Επώνυμο</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="inputLastname" name="lastname" value="{{ old('lastname') ?? $trainee->lastname }}">
                        @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-auto col-md-2">
                        <label for="registerNumber" title="Αριθμός Μητρώου">AM</label>
                        <input class="form-control @error('am') is-invalid @enderror" type="text" id="registerNumber" name="am" value="{{ old('am') ?? $trainee->am }}"/>
                        @error('am')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="form-group col-md-4">
                        <label for="inputPhone">Τηλέφωνο</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" id="inputPhone" name="phone" value="{{ old('phone') ?? $trainee->phone }}" placeholder="(προαιρετικό)"/>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail">Email</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="inputEmail" name="email" value="{{ old('email') ?? $trainee->email }}"/>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="form-group col-md-6 mb-4 mb-md-0">
                        <label for="inputSemester">Εξάμηνο</label>
                        <div id="inputSemester">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" id="radio1Semester" name="semester" value="Χειμερινό" @if (old('semester') ?? $trainee->semester === 'Χειμερινό') checked @endif>
                                <label class="custom-control-label" for="radio1Semester">Χειμερινό</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" type="radio" id="radio2Semester" name="semester" value="Εαρινό" @if (old('semester') ?? $trainee->semester === 'Εαρινό') checked @endif>
                                <label class="custom-control-label" for="radio2Semester">Εαρινό</label>
                            </div>
                            @error('semester')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSeason">Ακαδημαϊκή Χρονιά</label>
                        <div id="inputSeason" class="form-row">
                            <div class="col-5 col-lg-4 col-xl-3"> 
                                <input class="form-control @error('year_from') is-invalid @enderror" type="text" id="yearFrom" name="year_from" value="{{ old('year_from') ?? $trainee->year_from }}" placeholder="YYYY"/>
                                @error('year_from')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-2 text-center">
                                <label class="col-form-label">&mdash;</label>
                            </div>
                            <div class="col-5 col-lg-4 col-xl-3">
                                <input class="form-control @error('year_to') is-invalid @enderror" type="text" id="yearTo" name="year_to" value="{{ old('year_to') ?? $trainee->year_to }}" placeholder="YYYY"/>
                                @error('year_to')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-row mb-4">
                    <div class="form-group col-md-4">
                        <label for="inputSupervisor">Ακαδημαϊκός Επόπτης</label>
                        <input class="form-control @error('supervisor') is-invalid @enderror" type="text" id="inputSupervisor" name="supervisor" value="{{ old('supervisor') ?? $trainee->supervisor }}"/>
                        @error('supervisor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputCompany">Φορέας Απασχόλησης</label>
                        <input class="form-control @error('company') is-invalid @enderror" type="text" id="inputCompany" name="company" value="{{ old('company') ?? $trainee->company }}"/>
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputJob">Θέση Απασχόλησης</label>
                        <input class="form-control @error('job') is-invalid @enderror" type="text" id="inputJob" name="job" value="{{ old('job') ?? $trainee->job }}"/>
                        @error('job')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-sm btn-primary">Αποθήκευση <i class="far fa-paper-plane"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
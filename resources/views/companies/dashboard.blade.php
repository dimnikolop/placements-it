@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                aria-controls="profile" aria-selected="true">Προφίλ :</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="jobs-tab" data-toggle="tab" href="#jobs" role="tab" aria-controls="jobs"
                aria-selected="false">Θέσεις Απασχόλησης :</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-4" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            <div class="row mb-5">
                <div class="col-md-12">
                    <h5 class="border-bottom py-3 text-primary">Γενικές Πληροφορίες</h5>
                </div>
                <div class="col-md-6">
                    <h6>Επωνυμία</h6>
                    <p>{{ $company->name }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Logo</h6>
                    <img src="{{ asset('img/company-1-45x45.png') }}" width="30" height="30" alt="...">
                </div>
                <div class="col-md-6">
                    <h6>Τομέας</h6>
                    <p>{{ $company->sector }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Ιστότοπος</h6>
                    <p>{{ $company->website }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Διεύθυνση</h6>
                    <p>{{ $company->address }}, {{ $company->zip_code }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Τοποθεσία</h6>
                    <p>{{ $company->location }}</p>
                </div>
                <div class="col-md-12 mb-3">
                    <h6>Περιγραφή</h6>
                    <div class="shadow-sm p-3"><p>{{ $company->description }}</p></div>
                </div>
                <div class="col-md-12">
                    <h6>Σημειώσεις / Σχόλια</h6>
                    <div class="shadow-sm p-3"><p>{{ $company->notes }}</p></div>
                </div>
            </div>

            <div class="contact-info row mb-5">
                <div class="col-md-12">
                    <h5 class="border-bottom py-3 text-primary">Στοιχεία Επικοινωνίας</h5>
                </div>
                <div class="col-md-6">
                    <h6>Υπεύθυνος Επικοινωνίας</h6>
                    <p>{{ $company->contact_person }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Τηλέφωνο</h6>
                    <p>{{ $company->phone }}</p>
                </div>
                <div class="col-md-6">
                    <h6>E-mail</h6>
                    <p>{{ $company->email }}</p>
                </div>
            </div>

            <div class="social-media-info row mb-5">
                <div class="col-md-12">
                    <h5 class="border-bottom py-3 text-primary">Σύνδεσμοι Social Media</h5>
                </div>
                <div class="col-md-6">
                    <h6>Facebook</h6>
                    <p></p>
                </div>
                <div class="col-md-6">
                    <h6>Twitter</h6>
                    <p></p>
                </div>
                <div class="col-md-6">
                    <h6>LinkedIn</h6>
                    <p></p>
                </div>
            </div>
           
            <div class="row justify-content-end">
                <!-- Button trigger edit modal -->
                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editCompanyModal">
                    <i class="far fa-edit"></i> Επεξεργασία
                </button>
                <!-- Button trigger delete modal -->
                <button type="button" class="btn btn-danger btn-sm ml-3" data-toggle="modal" data-target="#deleteCompanyModal"
                    data-id="">
                    <i class="far fa-trash-alt"></i> Διαγραφή
                </button>
            </div>
        </div>
        <div class="tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
            <div class="well d-flex flex-column justify-content-center align-items-center">
                <h6>Προσθέστε νέα θέση απασχόλησης</h6>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addJobModal">
                    <i class="fas fa-plus"></i> Προσθήκη
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Add Job Modal-->
<div class="modal fade" id="addJobModal" tabindex="-1" aria-labelledby="addJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addJobModalLabel">Προσθήκη νέας θέσης απασχόλησης</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addJobForm" action="{{ route('jobs.store') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="inputTitle">Τίτλος:<span class="required">*</span></label>
                        <input type="text" class="form-control @if($errors->job->has('title')) is-invalid @endif" id="inputTitle" name="title" value="{{ old('title') ?? $job->title ?? '' }}">
                        @if ($errors->job->has('title'))
                            <div class="invalid-feedback">{{ $errors->job->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputJobDescription">Περιγραφή:<span class="required">*</span></label>
                        <textarea class="form-control @if($errors->job->has('description')) is-invalid @endif" id="inputJobDescription" name="description" rows="7">{{ old('description') ?? $job->description ?? '' }}</textarea>
                        @if ($errors->job->has('description'))
                            <div class="invalid-feedback">{{ $errors->job->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputJobRequirements">Απαιτήσεις:<span class="required">*</span></label>
                        <textarea class="form-control @if($errors->job->has('requirements')) is-invalid @endif" id="inputJobRequirements" name="requirements" rows="5">{{ old('requirements') ?? $job->requirements ?? '' }}</textarea>
                        @if ($errors->job->has('requirements'))
                            <div class="invalid-feedback">{{ $errors->job->first('requirements') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-file-upload"></i> Προσθήκη</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Company Modal -->
<div class="modal fade" id="editCompanyModal" tabindex="-1" aria-labelledby="editCompanyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompanyModalLabel">Επεξεργασία των στοιχείων της εταιρείας</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="companyEditForm" action="{{ route('company.update', $company->id) }}" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="form-froup">
                        <label for="inputName">Επωνυμία:<span class="required">*</span></label>
                        <input type="text" class="form-control" id="inputName" value="{{ $company->name }}" aria-describedby="nameHelp" disabled>
                        <small id="nameHelp" class="form-text text-muted">Η επωνυμία της εταιρείας</small>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Περιγραφή:<span class="required">*</span></label>
                        <textarea class="form-control @if($errors->company->has('description')) is-invalid @endif" id="inputDescription" name="description" rows="5">{{ old('description') ?? $company->description }}</textarea>
                        @if($errors->company->has('description'))
                            <div class="invalid-feedback">{{ $errors->company->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputSector">Τομέας:<span class="required">*</span></label>
                        <select class="custom-select" id="inputSector" name="sector">
                            <option selected disabled>Παρακαλώ διαλέξτε μια από τις παρακάτω επιλογές</option>
                            <option {{ (old('sector') ?? $company->sector) == 'Δημόσιος Τομέας - Περιφέρεια, Δήμος' ? 'selected' : '' }}>Δημόσιος Τομέας - Περιφέρεια, Δήμος</option>
                            <option {{ (old('sector') ?? $company->sector) == 'Δημόσιος Τομέας - ΑΕΙ, ΤΕΙ' ? 'selected' : '' }}>Δημόσιος Τομέας - ΑΕΙ, ΤΕΙ</option>
                            <option {{ (old('sector') ?? $company->sector) == 'Ιδιωτικός Τομέας - Σχετικό με τεχνολογίες Πληροφορικής' ? 'selected' : '' }}>Ιδιωτικός Τομέας - Σχετικό με τεχνολογίες Πληροφορικής</option>
                            <option {{ (old('sector') ?? $company->sector) == 'Ιδιωτικός Τομέας - Μη σχετικό με τεχνολογίες Πληροφορικής' ? 'selected' : '' }}>Ιδιωτικός Τομέας - Μη σχετικό με τεχνολογίες Πληροφορικής</option>
                            <option {{ (old('sector') ?? $company->sector) == 'Άλλο - Τράπεζα' ? 'selected' : '' }}>Άλλο - Τράπεζα</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Διεύθυνση:<span class="required">*</span></label>
                        <input type="text" class="form-control @if($errors->company->has('address')) is-invalid @endif" id="inputAddress" name="address" value="{{ old('address') ?? $company->address }}">
                        @if($errors->company->has('address'))
                            <div class="invalid-feedback">{{ $errors->company->first('address') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputZipCode">Ταχυδρομικός Κώδικας:<span class="required">*</span></label>
                        <input type="text" class="form-control @if($errors->company->has('zip_code')) is-invalid @endif" id="inputZipCode" name="zip_code" value="{{ old('zip_code') ?? $company->zip_code }}"/>
                        @if($errors->company->has('zip_code'))
                            <div class="invalid-feedback">{{ $errors->company->first('zip_code') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputLocation">Τοποθεσία:<span class="required">*</span></label>
                        <select class="custom-select" id="inputLocation" name="location">
                            <option selected disabled>Παρακαλώ διαλέξτε μια από τις παρακάτω επιλογές</option>
                            <option {{ (old('location') ?? $company->location) == 'Θεσσαλονίκη' ? 'selected' : '' }}>Θεσσαλονίκη</option>
                            <option {{ (old('location') ?? $company->location) == 'Αθήνα' ? 'selected' : '' }}>Αθήνα</option>
                            <option {{ (old('location') ?? $company->location) == 'Υπόλοιπη Ελλάδα' ? 'selected' : '' }}>Υπόλοιπη Ελλάδα</option>
                            <option {{ (old('location') ?? $company->location) == 'Εξωτερικό' ? 'selected' : '' }}>Εξωτερικό</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputWebsite">Ιστότοπος:</label>
                        <input type="text" class="form-control @if($errors->company->has('website')) is-invalid @endif" id="inputWebsite" name="website" value="{{ old('website') ?? $company->website }}">
                        @if($errors->company->has('website'))
                            <div class="invalid-feedback">{{ $errors->company->first('website') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputContactPerson">Υπεύθυνος επικοινωνίας:<span class="required">*</span></label>
                        <input type="text" class="form-control @if($errors->company->has('contact_person')) is-invalid @endif" id="inputContactPerson" name="contact_person" value="{{ old('contact_person') ?? $company->contact_person }}">
                        @if($errors->company->has('contact_person'))
                            <div class="invalid-feedback">{{ $errors->company->first('contact_person') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Τηλέφωνο:<span class="required">*</span></label>
                        <input type="text" class="form-control @if($errors->company->has('phone')) is-invalid @endif" id="inputPhone" name="phone" value="{{ old('phone') ?? $company->phone }}">
                        @if($errors->company->has('phone'))
                            <div class="invalid-feedback">{{ $errors->company->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">E-mail:<span class="required">*</span></label>
                        <input type="email" class="form-control @if($errors->company->has('email')) is-invalid @endif" id="inputEmail" name="email" value="{{ old('email') ?? $company->email }}">
                        @if($errors->company->has('email'))
                            <div class="invalid-feedback">{{ $errors->company->first('email') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputNotes">Σημειώσεις / Σχόλια:</label>
                        <textarea class="form-control" id="inputNotes" name="notes" rows="5">{{ old('notes') ?? $company->notes }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Αποθήκευση</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Company Modal-->
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
@endsection
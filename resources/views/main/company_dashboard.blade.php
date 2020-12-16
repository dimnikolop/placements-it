@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                aria-controls="profile" aria-selected="true">Στοιχεία Εταιρείας :</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="jobs-tab" data-toggle="tab" href="#jobs" role="tab" aria-controls="jobs"
                aria-selected="false">Θέσεις Απασχόλησης :</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                aria-selected="false">Contact</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-4 border border-secondary" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            @if (session('success'))
                <div class="alert alert-success w-75 mx-auto" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            <div class="row">
                <div class="col-md-2">
                    <h6>Επωνυμία:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->name }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Περιγραφή:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->description }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Τομέας:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->sector }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Διεύθυνση:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->address }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Τοποθεσία:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->location }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Ιστότοπος:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->website }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Υπεύθυνος Επικοινωνίας:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->contact_person }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Τηλέφωνο:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->phone }}</p>
                </div>

                <div class="col-md-2">
                    <h6>E-mail:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->email }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Σημειώσεις:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->notes }}</p>
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
        <div class="tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab"></div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
</div>

<!-- Edit Modal -->
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
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName" name="name" value="{{ old('name') ?? $company->name }}" aria-describedby="nameHelp">
                        <small id="nameHelp" class="form-text text-muted">Η επωνυμία της εταιρείας</small>
                    </div>
                    <div class="form-group">
                        <label for="inputDescription">Περιγραφή:<span class="required">*</span></label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription" name="description" rows="5">{{ old('description') ?? $company->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputSector">Τομέας:<span class="required">*</span></label>
                        <select class="custom-select @error('sector') is-invalid @enderror" id="inputSector" name="sector">
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
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="inputAddress" name="address" value="{{ old('address') ?? $company->address }}">
                    </div>
                    <div class="form-group">
                        <label for="inputLocation">Τοποθεσία:<span class="required">*</span></label>
                        <select class="custom-select @error('location') is-invalid @enderror" id="inputLocation" name="location">
                            <option selected disabled>Παρακαλώ διαλέξτε μια από τις παρακάτω επιλογές</option>
                            <option {{ (old('location') ?? $company->location) == 'Θεσσαλονίκη' ? 'selected' : '' }}>Θεσσαλονίκη</option>
                            <option {{ (old('location') ?? $company->location) == 'Αθήνα' ? 'selected' : '' }}>Αθήνα</option>
                            <option {{ (old('location') ?? $company->location) == 'Υπόλοιπη Ελλάδα' ? 'selected' : '' }}>Υπόλοιπη Ελλάδα</option>
                            <option {{ (old('location') ?? $company->location) == 'Εξωτερικό' ? 'selected' : '' }}>Εξωτερικό</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputWebsite">Ιστότοπος:<span class="required">*</span></label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="inputWebsite" name="website" value="{{ old('website') ?? $company->website }}">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputContactPerson">Υπεύθυνος επικοινωνίας:<span class="required">*</span></label>
                        <input type="text" class="form-control @error('contact_person') is-invalid @enderror" id="inputContactPerson" name="contact_person" value="{{ old('contact_person') ?? $company->contact_person }}">
                        @error('contact_person')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputPhone">Τηλέφωνο:<span class="required">*</span></label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="inputPhone" name="phone" value="{{ old('phone') ?? $company->phone }}">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">E-mail:<span class="required">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="inputEmail" name="email" value="{{ old('email') ?? $company->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputNotes">Σημειώσεις / Σχόλια:<span class="required">*</span></label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="inputNotes" name="notes" rows="5">{{ old('notes') ?? $company->notes }}</textarea>
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
                    <button type="submit"  class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
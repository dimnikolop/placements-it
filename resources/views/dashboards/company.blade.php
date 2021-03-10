@extends('layouts.app')

@section('title', 'Προφίλ')

@section('content')
<div class="container">
    <ul class="nav nav-pills nav-fill bg-dark" id="dashboard-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="profile" aria-selected="true">Στοιχεία Εταιρείας</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="jobs-tab" data-toggle="pill" href="#jobs" role="tab" aria-controls="jobs" aria-selected="false">Θέσεις Απασχόλησης</a>
        </li>
    </ul>
    <div class="tab-content shadow mt-2 mt-sm-0" id="dashboard-content">
        <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            <div class="row mb-5">
                <div class="col-md-12 mb-2">
                    <h5 class="border-bottom py-2 text-primary">Γενικές Πληροφορίες</h5>
                </div>
                <div class="col-md-6">
                    <h6>Επωνυμία</h6>
                    <p>{{ $company->name }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Τομέας</h6>
                    <p>{{ $company->sector }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Διεύθυνση</h6>
                    <p>{{ $company->address }}, {{ $company->zip_code }}</p>
                </div>
                <div class="col-md-6">
                    <h6>Τοποθεσία</h6>
                    <p>{{ $company->location }}</p>
                </div>
                @if (!empty($company->website))
                <div class="col-md-6 mb-3">
                    <h6>Ιστότοπος</h6>
                    <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                </div>
                @endif
                <div class="col-md-12 mb-3">
                    <h6>Περιγραφή</h6>
                    <div class="desc-box"><p>{!! $company->description !!}</p></div>
                </div>
                @if (!empty($company->notes))
                    <div class="col-md-12">
                        <h6>Σημειώσεις &mdash; Σχόλια</h6>
                        <div class="desc-box"><p>{!! $company->notes !!}</p></div>
                    </div>
                @endif
            </div>

            <div class="contact-info row mb-5">
                <div class="col-md-12 mb-2">
                    <h5 class="border-bottom py-2 text-primary">Στοιχεία Επικοινωνίας</h5>
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
                <div class="col-md-12 mb-2">
                    <h5 class="border-bottom py-2 text-primary">Σύνδεσμοι Social Media</h5>
                </div>
                <div class="col-md-6">
                    <a class="social-links" href="{{ $company->facebook }}" target="_blank"><i class="fab fa-facebook-f fb-icon"></i> {{ $company->facebook }}</a>
                </div>
                <div class="col-md-6">
                    <a class="social-links" href="{{ $company->twitter }}" target="_blank"><i class="fab fa-twitter tw-icon"></i> {{ $company->twitter }}</a>
                </div>
                <div class="col-md-6">
                    <a class="social-links" href="{{ $company->linkedin }}" target="_blank"><i class="fab fa-linkedin-in li-icon"></i> {{ $company->linkedin }}</a>
                </div>
            </div>
           
            <div class="d-flex justify-content-end">
                <!-- Button trigger edit company modal -->
                <button type="button" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#editCompanyModal">
                    <i class="fas fa-pencil-alt fa-sm"></i> Επεξεργασία
                </button>
                <!-- Button trigger delete modal -->
                <button type="button" class="btn btn-sm btn-outline-danger ml-3 deleteBtn" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('companies.destroy', $company) }}">
                    <i class="far fa-trash-alt fa-sm"></i> Διαγραφή
                </button>
            </div>
        </div>
        <div class="tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">
            <div class="well d-flex flex-column align-items-center text-center">
                <h6>Προσθέστε νέα θέση απασχόλησης</h6>
                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addJobModal">
                    <i class="fas fa-plus"></i> Προσθήκη
                </button>
            </div>
            <div class="row">
                @foreach ($jobs as $job)
                <div class="col-xl-6">
                    <div class="card job-card">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('companies.jobs.show', [$company, $job]) }}" class="text-reset">{{ $job->title }}</a></h5>
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-3 mt-sm-4">
                                <div class="small text-muted"><i class="far fa-clock"></i> Δημοσιεύτηκε {{ $job->created_at->diffForHumans() }}</div>
                                <div class="mt-3 mt-sm-0">
                                    <!-- Button trigger edit job modal -->
                                    <button type="button" class="btn btn-sm btn-outline-info edit-job" data-toggle="modal" data-target="#editJobModal" data-job="{{ $job }}">
                                        <i class="fas fa-pencil-alt fa-sm"></i> Επεξεργασία
                                    </button>
                                    <!-- Button trigger delete modal -->
                                    <button type="button" class="btn btn-sm btn-outline-danger ml-3 deleteBtn" data-toggle="modal" data-target="#deleteModal" data-url="{{ route('jobs.destroy', $job) }}">
                                        <i class="far fa-trash-alt fa-sm"></i> Διαγραφή
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
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
            <form id="companyEditForm" action="{{ route('companies.update', $company->id) }}" method="post">
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
                        <textarea class="form-control editor @if($errors->company->has('description')) is-invalid @endif" id="inputDescription" name="description" rows="5">{{ old('description') ?? $company->description }}</textarea>
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
                        <label for="inputAddress">Διεύθυνση <span class="text-muted">(Οδός & Αριθμός)</span>:<span class="required">*</span></label>
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
                        <label for="inputNotes">Σημειώσεις &mdash; Σχόλια:</label>
                        <textarea class="form-control editor" id="inputNotes" name="notes" rows="5">{{ old('notes') ?? $company->notes }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inputFacebook">Facebook:</label>
                        <input type="text" class="form-control @if($errors->company->has('facebook')) is-invalid @endif" id="inputFacebook" name="facebook" value="{{ old('facebook') ?? $company->facebook }}">
                        @if($errors->company->has('facebook'))
                            <div class="invalid-feedback">{{ $errors->company->first('facebook') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputTwitter">Twitter:</label>
                        <input type="text" class="form-control @if($errors->company->has('twitter')) is-invalid @endif" id="inputTwitter" name="twitter" value="{{ old('twitter') ?? $company->twitter }}">
                        @if($errors->company->has('twitter'))
                            <div class="invalid-feedback">{{ $errors->company->first('twitter') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputLinkedIn">LinkedIn:</label>
                        <input type="text" class="form-control @if($errors->company->has('linkedin')) is-invalid @endif" id="inputLinkedIn" name="linkedin" value="{{ old('linkedin') ?? $company->linkedin }}">
                        @if($errors->company->has('linkedin'))
                            <div class="invalid-feedback">{{ $errors->company->first('linkedin') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Αποθήκευση</button>
                </div>
            </form>
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
            <form id="addJobForm" action="{{ route('companies.jobs.store', $company) }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="inputTitle">Τίτλος:<span class="required">*</span></label>
                        <input type="text" class="form-control @if($errors->job->has('title')) is-invalid @endif" id="inputTitle" name="title" value="{{ old('title') }}">
                        @if ($errors->job->has('title'))
                            <div class="invalid-feedback">{{ $errors->job->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputJobDescription">Περιγραφή:<span class="required">*</span></label>
                        <textarea class="form-control editor @if($errors->job->has('description')) is-invalid @endif" id="inputJobDescription" name="description" rows="7">{{ old('description') }}</textarea>
                        @if ($errors->job->has('description'))
                            <div class="invalid-feedback">{{ $errors->job->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="inputJobRequirements">Απαιτήσεις:<span class="required">*</span></label>
                        <textarea class="form-control editor @if($errors->job->has('requirements')) is-invalid @endif" id="inputJobRequirements" name="requirements" rows="5">{{ old('requirements') }}</textarea>
                        @if ($errors->job->has('requirements'))
                            <div class="invalid-feedback">{{ $errors->job->first('requirements') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-file-upload"></i> Προσθήκη</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Job Modal-->
<div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editJobModalLabel">Επεξεργασία θέσης απασχόλησης</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editJobForm" action="" method="post">
                <div class="modal-body">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="jobTitle">Τίτλος:<span class="required">*</span></label>
                        <input type="text" class="form-control @if($errors->edit_job->has('title')) is-invalid @endif" id="jobTitle" name="title" value="{{ old('title') }}">
                        @if ($errors->edit_job->has('title'))
                            <div class="invalid-feedback">{{ $errors->edit_job->first('title') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jobDescription">Περιγραφή:<span class="required">*</span></label>
                        <textarea class="form-control editor @if($errors->edit_job->has('description')) is-invalid @endif" id="jobDescription" name="description" rows="7">{{ old('description') }}</textarea>
                        @if ($errors->edit_job->has('description'))
                            <div class="invalid-feedback">{{ $errors->edit_job->first('description') }}</div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="jobRequirements">Απαιτήσεις:<span class="required">*</span></label>
                        <textarea class="form-control editor @if($errors->edit_job->has('requirements')) is-invalid @endif" id="jobRequirements" name="requirements" rows="5">{{ old('requirements') }}</textarea>
                        @if ($errors->edit_job->has('requirements'))
                            <div class="invalid-feedback">{{ $errors->edit_job->first('requirements') }}</div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-primary"><i class="fas fa-save"></i> Αποθήκευση</button>
                </div>
            </form>
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

@push('scripts')
    <script>
        var editors = [];
        
        $(".editor").each(function (index, element) {
            ClassicEditor
                .create( element, {
                    heading: {
                        options: [
                            {   model: 'heading1',
                                view: {
                                    name: 'h4',
                                    classes: 'formatted'
                                },
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {   model: 'heading2',
                                view: {
                                    name: 'h5',
                                    classes: 'formatted'
                                },
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {   model: 'heading3',
                                view: {
                                    name: 'h6',
                                    classes: 'formatted'
                                },
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'headingFancy',
                                view: {
                                    name: 'h5',
                                    classes: 'fancy'
                                },
                                title: 'Heading 2 (fancy)',
                                class: 'ck-heading_heading2_fancy',

                                // It needs to be converted before the standard 'heading2'.
                                converterPriority: 'high'
                            }
                        ]
                    },
                    link: {
                        defaultProtocol: 'http://',
                        addTargetToExternalLinks: true
                    }
                } )
                .then( editor => {
                    editors[index] = editor;
                } )
                .catch( error => {
                    console.error( error );
                } );
        });

        // Company Dashboard - Pass job data to edit job modal for display
        $('.edit-job').on('click', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var job = $(this).data('job') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            $('#editJobForm').attr('action', '/jobs/' + job.id);
            $('#jobTitle').val(job.title);
            editors[4].setData(job.description);
            editors[5].setData(job.requirements);
        });
    </script>
    @if ($errors->company->any())
        <script>
            $('#editCompanyModal').modal('show');
        </script>
    @endif

    @if ($errors->job->any())
        <script>
            $('#addJobModal').modal('show');
        </script>
    @endif

    @if ($errors->edit_job->any())
        <script>
            $('#editJobModal').modal('show');
        </script>
    @endif
@endpush
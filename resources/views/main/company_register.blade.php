@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card custom-main-card">
        <div class="card-body">
            <div class="card-title my-5 text-center"><h4>Εγγραφή Φορέα Απασχόλησης</h4></div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            <form id="companyRegisterForm" action="{{ route('company.register') }}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Επωνυμία:<span class="required">*</span></label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="inputName" name="name" value="{{ old('name') }}"/>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputSector">Τομέας:<span class="required">*</span></label>
                        <select class="custom-select @error('sector') is-invalid @enderror" id="inputSector" name="sector">
                            <option selected disabled>Παρακαλώ διαλέξτε μια από τις παρακάτω επιλογές</option>
                            <option @if (old('sector') == 'Δημόσιος Τομέας - Περιφέρεια, Δήμος') selected @endif>Δημόσιος Τομέας - Περιφέρεια, Δήμος</option>
                            <option @if (old('sector') == 'Δημόσιος Τομέας - ΑΕΙ, ΤΕΙ') selected @endif>Δημόσιος Τομέας - ΑΕΙ, ΤΕΙ</option>
                            <option @if (old('sector') == 'Ιδιωτικός Τομέας - Σχετικό με τεχνολογίες Πληροφορικής') selected @endif>Ιδιωτικός Τομέας - Σχετικό με τεχνολογίες Πληροφορικής</option>
                            <option @if (old('sector') == 'Ιδιωτικός Τομέας - Μη σχετικό με τεχνολογίες Πληροφορικής') selected @endif>Ιδιωτικός Τομέας - Μη σχετικό με τεχνολογίες Πληροφορικής</option>
                            <option @if (old('sector') == 'Άλλο - Τράπεζα') selected @endif>Άλλο - Τράπεζα</option>
                        </select>
                        @error('sector')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-8 col-lg-6">
                        <label for="inputAddress">Διεύθυνση <span class="text-muted">(Οδός & Αριθμός)</span>:<span class="required">*</span></label>
                        <input class="form-control @error('address') is-invalid @enderror" type="text" id="inputAddress" name="address" value="{{ old('address') }}"/>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-auto col-md-4 col-lg-2">
                        <label for="inputZipCode" tabindex="0" data-toggle="tooltip" data-placement="right" title="Ταχυδρομικός Κώδικας">Τ.K:<span class="required">*</span></label>
                        <input class="form-control @error('zip_code') is-invalid @enderror" type="text" id="inputZipCode" name="zip_code" value="{{ old('zip_code') }}"/>
                        @error('zip_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputLocation">Τοποθεσία:<span class="required">*</span></label>
                        <select class="custom-select @error('location') is-invalid @enderror" id="inputLocation" name="location">
                            <option selected disabled>Παρακαλώ διαλέξτε μια από τις παρακάτω επιλογές</option>
                            <option @if (old('location') == 'Θεσσαλονίκη') selected @endif>Θεσσαλονίκη</option>
                            <option @if (old('location') == 'Αθήνα') selected @endif>Αθήνα</option>
                            <option @if (old('location') == 'Υπόλοιπη Ελλάδα') selected @endif>Υπόλοιπη Ελλάδα</option>
                            <option @if (old('location') == 'Εξωτερικό') selected @endif>Εξωτερικό</option>
                        </select>
                        @error('location')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputWebsite">Ιστότοπος:</label>
                        <input class="form-control @error('website') is-invalid @enderror" type="text" id="inputWebsite" name="website" value="{{ old('website') }}" placeholder="https://example.com">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="row">
                    <div class="form-group col-md-5">
                        <label for="inputContactPerson">Υπεύθυνος επικοινωνίας:<span class="required">*</span></label>
                        <input class="form-control @error('contact_person') is-invalid @enderror" type="text" id="inputContactPerson" name="contact_person" value="{{ old('contact_person') }}"/>
                        @error('contact_person')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputEmail">E-mail:<span class="required">*</span></label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="inputEmail" name="email" value="{{ old('email') }}"/>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputPhone">Τηλέφωνο:<span class="required">*</span></label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" id="inputPhone" name="phone" value="{{ old('phone') }}"/>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputDescription">Περιγραφή:<span class="required">*</span></label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="inputDescription" name="description" rows="5">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="inputNotes">Σημειώσεις &mdash; Σχόλια:</label>
                    <textarea class="form-control @error('notes') is-invalid @enderror" id="inputNotes" name="notes" rows="5">{{ old('notes') }}</textarea>
                </div>

                <div class="d-flex justify-content-center align-items-center register-header mx-lg-5 my-5">
                    <h5 class="font-weight-light my-auto mx-2 mx-md-5">Social Media</h5>
                </div>

                <div class="row" id="social-form-control">
                    <div class="form-group col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text fb-icon" id="facebook-addon"><i class="fab fa-facebook-f"></i></span>
                            </div>
                            <input type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook') }}" placeholder="Facebook (προαιρετικό)" aria-label="Facebook" aria-describedby="facebook-addon">
                            @error('facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text tw-icon" id="twitter-addon"><i class="fab fa-twitter"></i></span>
                            </div>
                            <input type="text" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ old('twitter') }}" placeholder="Twitter (προαιρετικό)" aria-label="Twitter" aria-describedby="twitter-addon">
                            @error('twitter')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text li-icon" id="linkedin-addon"><i class="fab fa-linkedin-in"></i></span>
                            </div>
                            <input type="text" class="form-control @error('linkedin') is-invalid @enderror" name="linkedin" value="{{ old('linkedin') }}" placeholder="LinkedIn (προαιρετικό)" aria-label="linkedin" aria-describedby="linkedin-addon">
                            @error('linkedin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center align-items-center register-header mx-lg-5 my-5">
                    <h5 class="font-weight-light my-auto mx-2 mx-md-5">Στοιχεία Λογαριασμού</h5>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="inputUsername">Όνομα Χρήστη:<span class="required">*</span></label>
                        <input class="form-control @error('username') is-invalid @enderror" type="text" id="inputUsername" name="username" value="{{ old('username') }}"/>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPassword">Κωδικός Πρόσβασης:<span class="required">*</span></label>
                        <input class="form-control @error('password') is-invalid @enderror" type="text" id="inputPassword" name="password" value="{{ old('password') }}"/>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small id="passwordHelpInline" class="form-text text-muted">Must be 8-20 characters long.</small>
                    </div>
                </div>

                <div class="row mb-5">
                    <div class="form-group col-md-6">
                        <label for="inputPasswordConfirmation">Επιβεβαίωση:<span class="required">*</span></label>
                        <input class="form-control @error('password_confirmation') is-invalid @enderror" type="text" id="inputPasswordConfirmation" name="password_confirmation" value="{{ old('password_confirmation') }}"/>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                    
                <div class="text-center mb-4">
                    <button id="submitBtn" type="submit" name="submit_btn" class="btn btn-primary">Εγγραφή  <i class="far fa-paper-plane"></i></button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
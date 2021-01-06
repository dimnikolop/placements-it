@extends('layouts.app')

@section('content')
<div class="container">
    <div id="" class="card">
        <div class="card-body">
            <div class="card-title my-5 text-center"><h4>Εγγραφή Απόφοιτου Τμήματος</h4></div>
            @if (session('success'))
            <div class="alert alert-success text-center" role="alert">
                <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                    {{ session('success') }}
                </p>
            </div>
            @endif
            <form id="graduateRegisterForm" action="{{ route('graduate.register') }}" method="post">
                @csrf
                <div class="form-section">
                    <h5 class="font-weight-light text-center">Προσωπικά στοιχεία</h5>

                    <div class="form-group row">
                        <label class="col-md-3 col-lg-3 col-form-label text-md-right" for="inputSurname">Επώνυμο:<span class="required">*</span></label>
                        <div class="col-md-8 col-lg-7">
                            <input class="form-control @error('surname') is-invalid @enderror" type="text" id="inputSurname" name="surname" value="{{ old('surname') }}"/>
                            @error('surname')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-lg-3 col-form-label text-md-right" for="inputName">Όνομα:<span class="required">*</span></label>
                        <div class="col-md-8 col-lg-7">
                            <input class="form-control @error('name') is-invalid @enderror" type="text" id="inputName" name="name" value="{{ old('name') }}"/>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-lg-3 col-form-label text-md-right" for="inputFatherName">Όνομα Πατέρα:<span class="required">*</span></label>
                        <div class="col-md-8 col-lg-7">
                            <input class="form-control @error('father_name') is-invalid @enderror" type="text" id="inputFatherName" name="father_name" value="{{ old('father_name') }}"/>
                            @error('father_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-md-3 col-lg-3 col-form-label text-lg-right px-md-0 px-lg-3" for="inputGraduationYear">Έτος αποφοίτησης:<span class="required">*</span></label>
                        <div class="col-6 col-md-4 col-lg-2">
                            <div class="input-group"> 
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                                </div>
                                <input class="form-control @error('graduation_year') is-invalid @enderror" type="text" id="inputGraduationYear" name="graduation_year" value="{{ old('graduation_year') }}" placeholder="YYYY"/>
                                @error('graduation_year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group row align-items-center mb-5">
                        <label class="col-md-3 col-form-label text-md-right" for="inputDiploma">Πτυχίο:<span class="required">*</span></label>
                        <div class="col-auto">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="checkBSc" name="diploma[]" value="BSc" @if (old('diploma') && in_array('BSc', old('diploma'))) checked @endif>
                                <label class="custom-control-label" for="checkBSc">BSc</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="checkMSc" name="diploma[]" value="MSc" @if (old('diploma') && in_array('MSc', old('diploma'))) checked @endif>
                                <label class="custom-control-label" for="checkMSc">MSc</label>
                            </div>
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="checkPhD" name="diploma[]" value="PhD" @if (old('diploma') && in_array('PhD', old('diploma'))) checked @endif>
                                <label class="custom-control-label" for="checkPhD">PhD</label>
                            </div>
                            @error('diploma')
                                <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                
                    <h5 class="font-weight-light text-center">Στοιχεία Επικοινωνίας</h5>

                    <div class="form-group row">
                        <label class="col-md-3 col-lg-3 col-form-label text-md-right" for="inputPhone">Τηλέφωνο:</label>
                        <div class="col-md-8 col-lg-7">
                            <input class="form-control @error('phone') is-invalid @enderror" type="text" id="inputPhone" name="phone" value="{{ old('phone') }}"/>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-lg-3 col-form-label text-md-right" for="inputEmail">E-mail:<span class="required">*</span></label>
                        <div class="col-md-8 col-lg-7">
                            <input class="form-control @error('email') is-invalid @enderror" type="email" id="inputEmail" name="email" value="{{ old('email') }}"/>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-3 col-lg-3 col-form-label text-lg-right" for="inputWebsite">Ιστότοπος:</label>
                        <div class="col-md-8 col-lg-7">
                            <input class="form-control @error('website') is-invalid @enderror" type="text" id="inputWebsite" name="website" value="{{ old('website') }}" placeholder="https://example.com"/>
                            @error('website')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h5 class="font-weight-light text-center">Επαγγελματικά στοιχεία</h5>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right" for="inputJob">Τρέχουσα θέση εργασίας:<span class="required">*</span></label>
                        <div class="col-lg-8">
                            <input class="form-control @error('job') is-invalid @enderror" type="text" id="inputJob" name="job" value="{{ old('job') }}" placeholder="(π.χ. Προγραμματιστής Εφαρμογών Ιστού)"/>
                            @error('job')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right" for="inputEmployer">Εργοδότης:<span class="required">*</span></label>
                        <div class="col-lg-8">
                            <input class="form-control @error('employer') is-invalid @enderror" type="text" id="inputEmployer" name="employer" value="{{ old('employer') }}"/>
                            @error('employer')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-lg-3 col-form-label text-lg-right" for="inputWorkAddress">Διεύθυνση εργασίας:<span class="required">*</span><span class="d-block text-muted">(Οδός & Αριθμός)</span></label>
                        <div class="col-lg-8">
                            <input class="form-control @error('work_address') is-invalid @enderror" type="text" id="inputWorkAddress" name="work_address" value="{{ old('work_address') }}"/>
                            @error('work_address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right" for="inputPostalCode">Ταχυδρομικός Κώδικας:<span class="required">*</span></label>
                        <div class="col-auto col-md-2">
                            <input class="form-control @error('postal_code') is-invalid @enderror" type="text" id="inputPostalCode" name="postal_code" value="{{ old('postal_code') }}"/>
                            @error('postal_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right" for="inputCity">Πόλη:<span class="required">*</span></label>
                        <div class="col-auto">
                            <input class="form-control @error('city') is-invalid @enderror" type="text" id="inputCity" name="city" value="{{ old('city') }}"/>
                            @error('city')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <h5 class="font-weight-light text-center">Σχόλια</h5>

                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label text-lg-right" for="inputNotes">Σχόλια για το Τμήμα:</label>
                        <div class="col-lg-8">
                            <textarea class="form-control" id="inputNotes" name="notes" rows="5">{{ old('notes') }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-9 col-sm-auto col-lg-3 col-form-label text-lg-right" for="inputAddToMap">Προσθήκη στον χάρτη αποφοίτων:</label>
                        <div class="col-auto pt-2">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" class="custom-control-input" id="checkMap" name="map" value="1" @if (old('map')) checked @endif>
                                <label class="custom-control-label" for="checkMap"></label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-section">
                    <h5 class="font-weight-light text-center">Ερωτηματολόγιο Απορρόφησης Αποφοίτων από την Αγορά Εργασίας</h5>

                    <div class="well"><em>
                        Σημείωση: Το ερωτηματολόγιο <u>δεν</u> είναι υποχρεωτικό προς συμπλήρωση.
                    </em></div>
                    
                    <div class="well"><em>
                        Σκοπός του ερωτηματολογίου είναι η συλλογή στοιχείων που σχετίζονται με την απορρόφηση των αποφοίτων του Τμήματος Πληροφορικής του ΑΤΕΙΘ 
                        από την αγορά εργασίας. Το ερωτηματολόγιο θα χρησιμοποιηθεί αρχικά για την αξιολόγηση και στη συνέχεια τη βελτίωση της σχέσης της αρχικής 
                        εκπαίδευσης και επαγγελματικής κατάρτισης με την αγορά εργασίας.  Σας διαβεβαιώνουμε ότι τα προσωπικά σας δεδομένα και οι απαντήσεις σας είναι 
                        εμπιστευτικές και δεν πρόκειται να διαβιβαστούν σε τρίτους.
                    </em></div>

                    @error('questionnaire')
                        <div class="alert alert-danger text-center" role="alert">
                            <p class="mb-0">
                                <i class='fas fa-times-circle'></i> <strong>Error!</strong> {{ $message }}
                            </p>
                        </div>
                    @enderror

                    <div class="form-group row align-items-center">
                        <label class="col-md-10 col-lg-8 col-form-label" for="inputQuestion1">1. Χρόνος αναζήτησης εργασίας από την αποφοίτηση έως την έναρξη εργασίας (μήνες):</label>
                        <div class="col-auto col-md-2">
                            <input class="form-control @error('question1') is-invalid @enderror"  type="text" id="inputQuestion1" name="question1" value="{{ old('question1') }}"/>
                        </div>
                        @error('question1')
                            <div class="invalid-feedback d-block d-lg-inline px-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">2. Τρόποι αναζήτησης εργασίας:</label>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check1_2" name="question2[]" value="Αγγελία" @if (old('question2') && in_array('Αγγελία', old('question2'))) checked @endif>
                            <label class="custom-control-label" for="check1_2">Αγγελία</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check2_2" name="question2[]" value="Διαγωνισμός" @if (old('question2') && in_array('Διαγωνισμός', old('question2'))) checked @endif>
                            <label class="custom-control-label" for="check2_2">Διαγωνισμός</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check3_2" name="question2[]" value="Πρακτική Άσκηση" @if (old('question2') && in_array('Πρακτική Άσκηση', old('question2'))) checked @endif>
                            <label class="custom-control-label" for="check3_2">Πρακτική Άσκηση</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check4_2" name="question2[]" value="Γραφείο Διασύνδεσης" @if (old('question2') && in_array('Γραφείο Διασύνδεσης', old('question2'))) checked @endif>
                            <label class="custom-control-label" for="check4_2">Γραφείο Διασύνδεσης</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check5_2" name="question2[]" value="Internet" @if (old('question2') && in_array('Internet', old('question2'))) checked @endif>
                            <label class="custom-control-label" for="check5_2">Internet</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check6_2" name="question2[]" value="Άλλο" @if (old('question2') && in_array('Άλλο', old('question2'))) checked @endif>
                            <label class="custom-control-label" for="check6_2">Άλλο</label>
                        </div>
                        @error('question2')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">3. Αυτή είναι η αρχική θέση εργασίας μετά την αποφοίτησή μου ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio3Yes" name="question3" value="Ναι" @if (old('question3') == 'Ναι') checked @endif>
                            <label class="custom-control-label" for="radio3Yes">Ναι</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio3No" name="question3" value="Όχι" @if (old('question3') == 'Όχι') checked @endif>
                            <label class="custom-control-label" for="radio3No">Όχι</label>
                        </div>
                        @error('question3')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group row align-items-center">
                        <label class="col-md-auto col-form-label" for="inputQuestion4">4. Συνολικός χρόνος επαγγελματικής απασχόλησης (μήνες):</label>
                        <div class="col-auto col-md-2">
                            <input class="form-control @error('question4') is-invalid @enderror" type="text" id="inputQuestion4" name="question4" value="{{ old('question4') }}"/>
                        </div>
                        @error('question4')
                            <div class="invalid-feedback d-block d-lg-inline px-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">5. Σχέση εργασίας:</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio1_5" name="question5" value="Εξαρτημένη εργασία" @if (old('question5') == 'Εξαρτημένη εργασία') checked @endif>
                            <label class="custom-control-label" for="radio1_5">Εξαρτημένη εργασία</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio2_5" name="question5" value="Ελεύθερος επαγγελματίας" @if (old('question5') == 'Ελεύθερος επαγγελματίας') checked @endif>
                            <label class="custom-control-label" for="radio2_5">Ελεύθερος επαγγελματίας</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio3_5" name="question5" value="Άλλο" @if (old('question5') == 'Άλλο') checked @endif>
                            <label class="custom-control-label" for="radio3_5">Άλλο</label>
                        </div>
                        @error('question5')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">6. Σε ποιον τομέα εργάζεστε ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio1_6" name="question6" value="Δημόσιο" @if (old('question6') == 'Δημόσιο') checked @endif>
                            <label class="custom-control-label" for="radio1_6">Δημόσιο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio2_6" name="question6" value="Ιδιωτικό" @if (old('question6') == 'Ιδιωτικό') checked @endif>
                            <label class="custom-control-label" for="radio2_6">Ιδιωτικό</label>
                        </div>
                        @error('question6')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">7. Με ποια ειδικότητα απασχολείστε ;</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio1_7" name="question7" value="Αναλυτής Εφαρμογών" @if (old('question7') == 'Αναλυτής Εφαρμογών') checked @endif>
                            <label class="custom-control-label" for="radio1_7">Αναλυτής Εφαρμογών</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio2_7" name="question7" value="Αναλυτής Συστημάτων" @if (old('question7') == 'Αναλυτής Συστημάτων') checked @endif>
                            <label class="custom-control-label" for="radio2_7">Αναλυτής Συστημάτων</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio3_7" name="question7" value="Προγραμματιστής Εφαρμογών" @if (old('question7') == 'Προγραμματιστής Εφαρμογών') checked @endif>
                            <label class="custom-control-label" for="radio3_7">Προγραμματιστής Εφαρμογών</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio4_7" name="question7" value="Διαχειριστής Δικτύου" @if (old('question7') == 'Διαχειριστής Δικτύου') checked @endif>
                            <label class="custom-control-label" for="radio4_7">Διαχειριστής Δικτύου</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio5_7" name="question7" value="Διαχειριστής Βάσεων Δεδομένων" @if (old('question7') == 'Διαχειριστής Βάσεων Δεδομένων') checked @endif>
                            <label class="custom-control-label" for="radio5_7">Διαχειριστής Βάσεων Δεδομένων</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio6_7" name="question7" value="Προγραμματιστής Συστημάτων" @if (old('question7') == 'Προγραμματιστής Συστημάτων') checked @endif>
                            <label class="custom-control-label" for="radio6_7">Προγραμματιστής Συστημάτων</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio7_7" name="question7" value="Web developer" @if (old('question7') == 'Web developer') checked @endif>
                            <label class="custom-control-label" for="radio7_7">Web developer</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio8_7" name="question7" value="Service Η/Υ, Αναβαθμίσεις, Υποστήριξη" @if (old('question7') == 'Service Η/Υ, Αναβαθμίσεις, Υποστήριξη') checked @endif>
                            <label class="custom-control-label" for="radio8_7">Service Η/Υ, Αναβαθμίσεις, Υποστήριξη</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio9_7" name="question7" value="Εκπαιδευτικός" @if (old('question7') == 'Εκπαιδευτικός') checked @endif>
                            <label class="custom-control-label" for="radio9_7">Εκπαιδευτικός</label>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="radio10_7" name="question7" value="Άλλο" @if (old('question7') == 'Άλλο') checked @endif>
                                    <label class="custom-control-label" for="radio10_7">Άλλο:</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <input type="text" class="form-control form-control-sm @error('other7') is-invalid @enderror" id="inputOther7" name="other7" value="{{ old('other7') }}">
                                @error('other7')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @error('question7')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">8. Έχετε κάποια θέση ευθύνης ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio8Yes" name="question8" value="Ναι" @if (old('question8') == 'Ναι') checked @endif>
                            <label class="custom-control-label" for="radio8Yes">Ναι</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio8No" name="question8" value="Όχι" @if (old('question8') == 'Όχι') checked @endif>
                            <label class="custom-control-label" for="radio8No">Όχι</label>
                        </div>
                        @error('question8')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group offset-1">
                        <label class="d-block">8α. Δημόσιος Τομέας :</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio1_8a" name="question8a" value="Διευθυντής Γυμνασίου/Λυκείου" @if (old('question8a') == 'Διευθυντής Γυμνασίου/Λυκείου') checked @endif>
                            <label class="custom-control-label" for="radio1_8a">Διευθυντής Γυμνασίου/Λυκείου</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio2_8a" name="question8a" value="Διευθυντής Τομέα" @if (old('question8a') == 'Διευθυντής Τομέα') checked @endif>
                            <label class="custom-control-label" for="radio2_8a">Διευθυντής Τομέα</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio3_8a" name="question8a" value="Διευθυντής ΣΕΚ" @if (old('question8a') == 'Διευθυντής ΣΕΚ') checked @endif>
                            <label class="custom-control-label" for="radio3_8a">Διευθυντής ΣΕΚ</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio4_8a" name="question8a" value="ΠΛΗΝΕΤ" @if (old('question8a') == 'ΠΛΗΝΕΤ') checked @endif>
                            <label class="custom-control-label" for="radio4_8a">ΠΛΗΝΕΤ</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio5_8a" name="question8a" value="Σύμβουλος Εκπαίδευσης" @if (old('question8a') == 'Σύμβουλος Εκπαίδευσης') checked @endif>
                            <label class="custom-control-label" for="radio5_8a">Σύμβουλος Εκπαίδευσης</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio6_8a" name="question8a" value="Προϊστάμενος/Διευθυντής Τμήματος" @if (old('question8a') == 'Προϊστάμενος/Διευθυντής Τμήματος') checked @endif>
                            <label class="custom-control-label" for="radio6_8a">Προϊστάμενος/Διευθυντής Τμήματος</label>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="radio7_8a" name="question8a" value="Άλλο" @if (old('question8a') == 'Άλλο') checked @endif>
                                    <label class="custom-control-label" for="radio7_8a">Άλλο:</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <input type="text" class="form-control form-control-sm @error('other8a') is-invalid @enderror" id="inputOther8a" name="other8a" value="{{ old('other8a') }}">
                                @error('other8a')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @error('question8a')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group offset-1">
                        <label class="d-block">8β. Ιδιωτικός Τομέας :</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio1_8b" name="question8b" value="Προϊστάμενος/Διευθυντής Τμήματος" @if (old('question8b') == 'Προϊστάμενος/Διευθυντής Τμήματος') checked @endif>
                            <label class="custom-control-label" for="radio1_8b">Προϊστάμενος/Διευθυντής Τμήματος</label>
                        </div>
                        <div class="row">
                            <div class="col-auto">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="radio2_8b" name="question8b" value="Άλλο" @if (old('question8b') == 'Άλλο') checked @endif>
                                    <label class="custom-control-label" for="radio2_8b">Άλλο:</label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <input type="text" class="form-control form-control-sm @error('other8b') is-invalid @enderror" id="inputOther8b" name="other8b" value="{{ old('other8b') }}">
                                @error('other8b')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @error('question8b')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group offset-1">
                        <label class="d-block">8γ. Ποια επιπλέον προσόντα απαιτήθηκαν για την κατάληψη της Θέσης Ευθύνης :</label>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check1_8c" name="question8c[]" value="MSc" @if (old('question8c') && in_array('MSc', old('question8c'))) checked @endif>
                            <label class="custom-control-label" for="check1_8c">MSc</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check2_8c" name="question8c[]" value="PhD" @if (old('question8c') && in_array('PhD', old('question8c'))) checked @endif>
                            <label class="custom-control-label" for="check2_8c">PhD</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check3_8c" name="question8c[]" value="Άλλο πτυχίο" @if (old('question8c') && in_array('Άλλο πτυχίο', old('question8c'))) checked @endif>
                            <label class="custom-control-label" for="check3_8c">Άλλο πτυχίο</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check4_8c" name="question8c[]" value="Ξένη Γλώσσα" @if (old('question8c') && in_array('Ξένη Γλώσσα', old('question8c'))) checked @endif>
                            <label class="custom-control-label" for="check4_8c">Ξένη Γλώσσα</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check5_8c" name="question8c[]" value="Προϋπηρεσία" @if (old('question8c') && in_array('Προϋπηρεσία', old('question8c'))) checked @endif>
                            <label class="custom-control-label" for="check5_8c">Προϋπηρεσία</label>
                        </div>
                        <div class="custom-control custom-checkbox custom-control-inline">
                            <input type="checkbox" class="custom-control-input" id="check6_8c" name="question8c[]" value="Άλλο" @if (old('question8c') && in_array('Άλλο', old('question8c'))) checked @endif>
                            <label class="custom-control-label" for="check6_8c">Άλλο</label>
                        </div>
                        @error('question8c')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">9. Η ειδικότητά σας (Τίτλος Πτυχίου) ήταν απαραίτητη για την κάλυψη της θέσης ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio9Yes" name="question9" value="Ναι" @if (old('question9') == 'Ναι') checked @endif>
                            <label class="custom-control-label" for="radio9Yes">Ναι</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio9No" name="question9" value="Όχι" @if (old('question9') == 'Όχι') checked @endif>
                            <label class="custom-control-label" for="radio9No">Όχι</label>
                        </div>
                        @error('question9')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">10. Η Πρακτική σας Άσκησή ήταν σε παρόμοιο χώρο εργασίας ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio10Yes" name="question10" value="Ναι" @if (old('question10') == 'Ναι') checked @endif>
                            <label class="custom-control-label" for="radio10Yes">Ναι</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio10No" name="question10" value="Όχι" @if (old('question10') == 'Όχι') checked @endif>
                            <label class="custom-control-label" for="radio10No">Όχι</label>
                        </div>
                        @error('question10')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">11. Η Πρακτική σας Άσκησή εκτιμήθηκε ως εμπειρία για τη θέση ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio11Yes" name="question11" value="Ναι" @if (old('question11') == 'Ναι') checked @endif>
                            <label class="custom-control-label" for="radio11Yes">Ναι</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio11No" name="question11" value="Όχι" @if (old('question11') == 'Όχι') checked @endif>
                            <label class="custom-control-label" for="radio11No">Όχι</label>
                        </div>
                        @error('question11')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">11α. Μήπως στην πρώτη σας εργασία προσληφθήκατε απ’ την εταιρία στην οποία κάνατε την Πρακτική σας Άσκηση ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio11aYes" name="question11a" value="Ναι" @if (old('question11a') == 'Ναι') checked @endif>
                            <label class="custom-control-label" for="radio11aYes">Ναι</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio11aNo" name="question11a" value="Όχι" @if (old('question11a') == 'Όχι') checked @endif>
                            <label class="custom-control-label" for="radio11aNo">Όχι</label>
                        </div>
                        @error('question11a')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">12. Εκτός του πτυχίου είχατε και μεταπτυχιακό τίτλο για τη θέση ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio12Yes" name="question12" value="Ναι" @if (old('question12') == 'Ναι') checked @endif>
                            <label class="custom-control-label" for="radio12Yes">Ναι</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio12No" name="question12" value="Όχι" @if (old('question12') == 'Όχι') checked @endif>
                            <label class="custom-control-label" for="radio12No">Όχι</label>
                        </div>
                        @error('question12')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">13. Εκτός του πτυχίου διαθέτατε και άλλη εμπειρία σχετική με τη θέση ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio13Yes" name="question13" value="Ναι" @if (old('question13') == 'Ναι') checked @endif>
                            <label class="custom-control-label" for="radio13Yes">Ναι</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio13No" name="question13" value="Όχι" @if (old('question13') == 'Όχι') checked @endif>
                            <label class="custom-control-label" for="radio13No">Όχι</label>
                        </div>
                        @error('question13')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">14. Πόσο σχετική με το αντικείμενο είναι η θέση απασχόλησης ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio14None" name="question14" value="Καθόλου" @if (old('question14') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio14None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio14Little" name="question14" value="Λίγο" @if (old('question14') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio14Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio14Enough" name="question14" value="Αρκετά" @if (old('question14') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio14Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio14Very" name="question14" value="Πολύ" @if (old('question14') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio14Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio14VeryMuch" name="question14" value="Πάρα πολύ" @if (old('question14') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio14VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question14')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">15. Οι θεωρητικές σας γνώσεις κάλυπταν τις απαιτήσεις της θέσης εργασίας ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio15None" name="question15" value="Καθόλου" @if (old('question15') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio15None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio15Little" name="question15" value="Λίγο" @if (old('question15') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio15Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio15Enough" name="question15" value="Αρκετά" @if (old('question15') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio15Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio15Very" name="question15" value="Πολύ" @if (old('question15') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio15Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio15VeryMuch" name="question15" value="Πάρα πολύ" @if (old('question15') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio15VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question15')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">16. Οι πρακτικές σας γνώσεις κάλυπταν τις απαιτήσεις της θέσης εργασίας ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio16None" name="question16" value="Καθόλου" @if (old('question16') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio16None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio16Little" name="question16" value="Λίγο" @if (old('question16') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio16Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio16Enough" name="question16" value="Αρκετά" @if (old('question16') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio16Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio16Very" name="question16" value="Πολύ" @if (old('question16') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio16Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio16VeryMuch" name="question16" value="Πάρα πολύ" @if (old('question16') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio16VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question16')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">17. Αν εργάζεστε ως πτυχιούχοι ΤΕΙ, αξιοποιείτε τα αντικείμενα που διδαχθήκατε ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio17None" name="question17" value="Καθόλου" @if (old('question17') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio17None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio17Little" name="question17" value="Λίγο" @if (old('question17') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio17Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio17Enough" name="question17" value="Αρκετά" @if (old('question17') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio17Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio17Very" name="question17" value="Πολύ" @if (old('question17') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio17Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio17VeryMuch" name="question17" value="Πάρα πολύ" @if (old('question17') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio17VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question17')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">18. Η Πρακτική σας Άσκηση ήταν χρήσιμη σε σχέση με την θέση εργασίας ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio18None" name="question18" value="Καθόλου" @if (old('question18') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio18None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio18Little" name="question18" value="Λίγο" @if (old('question18') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio18Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio18Enough" name="question18" value="Αρκετά" @if (old('question18') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio18Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio18Very" name="question18" value="Πολύ" @if (old('question18') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio18Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio18VeryMuch" name="question18" value="Πάρα πολύ" @if (old('question18') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio18VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question18')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">19. Είστε ικανοποιημένος με την τωρινή απασχόλησή σας ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio19None" name="question19" value="Καθόλου" @if (old('question19') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio19None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio19Little" name="question19" value="Λίγο" @if (old('question19') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio19Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio19Enough" name="question19" value="Αρκετά" @if (old('question19') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio19Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio19Very" name="question19" value="Πολύ" @if (old('question19') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio19Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio19VeryMuch" name="question19" value="Πάρα πολύ" @if (old('question19') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio19VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question19')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">20. Είστε ικανοποιημένος με τις σπουδές σας ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio20None" name="question20" value="Καθόλου" @if (old('question20') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio20None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio20Little" name="question20" value="Λίγο" @if (old('question20') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio20Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio20Enough" name="question20" value="Αρκετά" @if (old('question20') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio20Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio20Very" name="question20" value="Πολύ" @if (old('question20') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio20Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio20VeryMuch" name="question20" value="Πάρα πολύ" @if (old('question20') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio20VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question20')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">21. Είστε ικανοποιημένος με την επαγγελματική σας πορεία ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio21None" name="question21" value="Καθόλου" @if (old('question21') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio21None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio21Little" name="question21" value="Λίγο" @if (old('question21') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio21Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio21Enough" name="question21" value="Αρκετά" @if (old('question21') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio21Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio21Very" name="question21" value="Πολύ" @if (old('question21') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio21Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio21VeryMuch" name="question21" value="Πάρα πολύ" @if (old('question21') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio21VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question21')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">22. Επιθυμείτε να προχωρήσετε σε μεταπτυχιακό επίπεδο σπουδών ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio22None" name="question22" value="Καθόλου" @if (old('question22') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio22None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio22Little" name="question22" value="Λίγο" @if (old('question22') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio22Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio22Enough" name="question22" value="Αρκετά" @if (old('question22') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio22Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio22Very" name="question22" value="Πολύ" @if (old('question22') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio22Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio22VeryMuch" name="question22" value="Πάρα πολύ" @if (old('question22') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio22VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question22')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">23. Οι σπουδές σας αποτελούν γερό θεμέλιο για την σταδιοδρομία σας ;</label>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio23None" name="question23" value="Καθόλου" @if (old('question23') == 'Καθόλου') checked @endif>
                            <label class="custom-control-label" for="radio23None">Καθόλου</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio23Little" name="question23" value="Λίγο" @if (old('question23') == 'Λίγο') checked @endif>
                            <label class="custom-control-label" for="radio23Little">Λίγο</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio23Enough" name="question23" value="Αρκετά" @if (old('question23') == 'Αρκετά') checked @endif>
                            <label class="custom-control-label" for="radio23Enough">Αρκετά</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio23Very" name="question23" value="Πολύ" @if (old('question23') == 'Πολύ') checked @endif>
                            <label class="custom-control-label" for="radio23Very">Πολύ</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio23VeryMuch" name="question23" value="Πάρα πολύ" @if (old('question23') == 'Πάρα πολύ') checked @endif>
                            <label class="custom-control-label" for="radio23VeryMuch">Πάρα πολύ</label>
                        </div>
                        @error('question23')
                            <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">24. Το ύψος των αμοιβών σας κυμαίνεται (καθαρές αμοιβές):</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio1_24" name="question24" value="Εώς 800 ευρώ" @if (old('question24') == 'Εώς 800 ευρώ') checked @endif>
                            <label class="custom-control-label" for="radio1_24">Εώς 800 ευρώ</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio2_24" name="question24" value="Από 801 ως 1500 ευρώ" @if (old('question24') == 'Από 801 ως 1500 ευρώ') checked @endif>
                            <label class="custom-control-label" for="radio2_24">Από 801 ως 1500 ευρώ</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio3_24" name="question24" value="Από 1501 ως 2500 ευρώ" @if (old('question24') == 'Από 1501 ως 2500 ευρώ') checked @endif>
                            <label class="custom-control-label" for="radio3_24">Από 1501 ως 2500 ευρώ</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio4_24" name="question24" value="Από 2501 ευρώ και πάνω" @if (old('question24') == 'Από 2501 ευρώ και πάνω') checked @endif>
                            <label class="custom-control-label" for="radio4_24">Από 2501 ευρώ και πάνω</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="radio5_24" name="question24" value="Δεν απαντώ" @if (old('question24') == 'Δεν απαντώ') checked @endif>
                            <label class="custom-control-label" for="radio5_24">Δεν απαντώ</label>
                        </div>
                        @error('question24')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="d-block">
                            25. Επιλέξτε μέχρι 5 από τα παρακάτω θεματικά αντικείμενα που διδαχθήκατε και που αποδείχθηκαν πιο ωφέλιμα κατά την εργασία σας.
                            <span class="font-weight-normal font-italic">
                                (Παρακαλούμε σημειώστε τα 5 αντικείμενα με αριθμούς από το <mark>1</mark> έως το <mark>5</mark> για να δηλώσετε τη σειρά σημαντικότητας, θέτοντας το <mark>1 στο πιο σημαντικό</mark>)
                            </span>
                        </label>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check1_25" name="question25[]" value="Γλώσσες/Μεθοδολογίες Προγραμματισμού" @if (old('question25') && in_array('Γλώσσες/Μεθοδολογίες Προγραμματισμού', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check1_25">Γλώσσες/Μεθοδολογίες Προγραμματισμού</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check2_25" name="question25[]" value="Λειτουργικά Συστήματα" @if (old('question25') && in_array('Λειτουργικά Συστήματα', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check2_25">Λειτουργικά Συστήματα</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check3_25" name="question25[]" value="Αρχιτεκτονική Η/Υ" @if (old('question25') && in_array('Αρχιτεκτονική Η/Υ', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check3_25">Αρχιτεκτονική Η/Υ</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check4_25" name="question25[]" value="Δίκτυα" @if (old('question25') && in_array('Δίκτυα', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check4_25">Δίκτυα</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check5_25" name="question25[]" value="Οργάνωση Διοίκηση Επιχειρήσεων" @if (old('question25') && in_array('Οργάνωση Διοίκηση Επιχειρήσεων', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check5_25">Οργάνωση Διοίκηση Επιχειρήσεων</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check6_25" name="question25[]" value="Βάσεις Δεδομένων" @if (old('question25') && in_array('Βάσεις Δεδομένων', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check6_25">Βάσεις Δεδομένων</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check7_25" name="question25[]" value="Πολυμέσα" @if (old('question25') && in_array('Πολυμέσα', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check7_25">Πολυμέσα</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check8_25" name="question25[]" value="Διαδίκτυο" @if (old('question25') && in_array('Διαδίκτυο', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check8_25">Διαδίκτυο</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check9_25" name="question25[]" value="Τεχνητή Νοημοσύνη/Ευφυή Συστήματα" @if (old('question25') && in_array('Τεχνητή Νοημοσύνη/Ευφυή Συστήματα', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check9_25">Τεχνητή Νοημοσύνη/Ευφυή Συστήματα</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check10_25" name="question25[]" value="Πληροφοριακά Συστήματα" @if (old('question25') && in_array('Πληροφοριακά Συστήματα', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check10_25">Πληροφοριακά Συστήματα</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check11_25" name="question25[]" value="Γραφικά" @if (old('question25') && in_array('Γραφικά', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check11_25">Γραφικά</label>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-2">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check12_25" name="question25[]" value="Άλλο" @if (old('question25') && in_array('Άλλο', old('question25'))) checked @endif>
                                    <label class="custom-control-label" for="check12_25">Άλλο</label>
                                </div>
                            </div>
                        </div>
                        @error('question25')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="form-navigation d-flex justify-content-around px-lg-5">
                    <button id="previousBtn" type="button" name="previous_btn" class="previous btn btn-success rounded-pill"><i class="fas fa-chevron-left"></i> Πίσω</button>
                    <button id="submitBtn" type="submit" name="submit_btn" class="btn btn-success rounded-pill">Υποβολή <i class="far fa-paper-plane"></i></button>
                    <button id="nextBtn" type="button" name="next_btn" class="next btn btn-success rounded-pill">Επόμενο</button>
                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection
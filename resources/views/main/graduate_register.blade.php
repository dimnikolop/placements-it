@extends('layouts.app')

@section('content')
<div class="container">
    <div id="registerForm">
        <h4 class="text-center mb-5">Εγγραφή Απόφοιτου Τμήματος</h4>
        @if (session('success'))
            <div class="alert alert-success w-75 mx-auto" role="alert">
                <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                    {{ session('success') }}
                </p>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="graduateRegisterForm" action="{{ route('graduate_register') }}" method="post" class="m-3">
            @csrf
            <div class="form-section">
                <h5 class="font-weight-light text-center">Προσωπικά στοιχεία</h5>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputSurname">Επώνυμο :<span class="required">*</span></label>
                    <div class="col-md-6">
                        <input class="form-control @error('surname') is-invalid @enderror" type="text" id="inputSurname" name="surname" value="{{ old('surname') }}"/>
                        @error('surname')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputName">Όνομα :<span class="required">*</span></label>
                    <div class="col-md-6">
                        <input class="form-control @error('name') is-invalid @enderror" type="text" id="inputName" name="name" value="{{ old('name') }}"/>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputFatherName">Όνομα Πατέρα :<span class="required">*</span></label>
                    <div class="col-md-6">
                        <input class="form-control @error('father_name') is-invalid @enderror" type="text" id="inputFatherName" name="father_name" value="{{ old('father_name') }}"/>
                        @error('father_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputGraduationYear">Έτος αποφοίτησης :<span class="required">*</span></label>
                    <div class="col-md-2">
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

                <div class="form-group">
                    <label class="col-md-3 col-form-label text-md-right @error('diploma') is-invalid @enderror" for="inputDiploma">Πτυχίο :<span class="required">*</span></label>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="checkBSc" name="diploma[]" value="BSc" checked>
                        <label class="custom-control-label" for="checkBSc">BSc</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="checkMSc" name="diploma[]" value="MSc">
                        <label class="custom-control-label" for="checkMSc">MSc</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="checkPhD" name="diploma[]" value="PhD">
                        <label class="custom-control-label" for="checkPhD">PhD</label>
                    </div>
                    @error('diploma')
                        <div class="invalid-feedback col-md-6 offset-md-3">{{ $message }}</div>
                    @enderror
                </div>
            
                <h5 class="font-weight-light text-center">Στοιχεία Επικοινωνίας</h5>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputPhone">Τηλέφωνο :</label>
                    <div class="col-md-6">
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" id="inputPhone" name="phone" value="{{ old('phone') }}"/>
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputEmail">E-mail :<span class="required">*</span></label>
                    <div class="col-md-6">
                        <input class="form-control @error('email') is-invalid @enderror" type="email" id="inputEmail" name="email" value="{{ old('email') }}"/>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputWebsite">Ιστότοπος :</label>
                    <div class="col-md-6">
                        <input class="form-control @error('website') is-invalid @enderror" type="text" id="inputWebsite" name="website" value="{{ old('website') }}"/>
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-section">
                <h5 class="font-weight-light text-center">Επαγγελματικά στοιχεία</h5>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputJob">Τρέχουσα θέση εργασίας :<span class="required">*</span></label>
                    <div class="col-md-6">
                        <input class="form-control @error('job') is-invalid @enderror" type="text" id="inputJob" name="job" value="{{ old('job') }}" placeholder="(π.χ. Προγραμματιστής Εφαρμογών Ιστού)"/>
                        @error('job')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputEmployer">Εργοδότης :<span class="required">*</span></label>
                    <div class="col-md-6">
                        <input class="form-control @error('employer') is-invalid @enderror" type="text" id="inputEmployer" name="employer" value="{{ old('employer') }}"/>
                        @error('employer')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputWorkAddress">Διεύθυνση εργασίας :<span class="required">*</span><br/>(Οδός & Αριθμός)</label>
                    <div class="col-md-6">
                        <input class="form-control @error('work_address') is-invalid @enderror" type="text" id="inputWorkAddress" name="work_address" value="{{ old('work_address') }}"/>
                        @error('work_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputPostalCode">Ταχυδρομικός Κώδικας :<span class="required">*</span></label>
                    <div class="col-md-2">
                        <input class="form-control @error('postal_code') is-invalid @enderror" type="text" id="inputPostalCode" name="postal_code" value="{{ old('postal_code') }}"/>
                        @error('postal_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputCity">Πόλη :<span class="required">*</span></label>
                    <div class="col-md-6">
                        <input class="form-control @error('city') is-invalid @enderror" type="text" id="inputCity" name="city" value="{{ old('city') }}"/>
                        @error('city')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <legend class="text-center">Σχόλια</legend>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label text-md-right" for="inputNotes">Σχόλια για το Τμήμα :</label>
                    <div class="col-md-8">
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="inputNotes" name="notes" rows="5">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 col-form-label text-md-right" for="inputAddToMap">Προσθήκη στον χάρτη αποφοίτων :</label>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="checkMap" name="map" value="1" checked>
                        <label class="custom-control-label" for="checkMap"></label>
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

                <div class="form-group row mx-0">
                    <label class="col-md-8 col-form-label" for="inputAnswer1">1. Χρόνος αναζήτησης εργασίας από την αποφοίτηση έως την έναρξη εργασίας (μήνες) :</label>
                    <div class="col-md-2">
                        <input class="form-control"  type="text" id="inputAnswer1" name="answer1" value="{{ old('answer1') }}"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">2. Τρόποι αναζήτησης εργασίας :</label>
                    <div class="custom-control custom-checkbox custom-control-inline ml-3">
                        <input type="checkbox" class="custom-control-input" id="check1_2" name="answer2[]" value="Αγγελία">
                        <label class="custom-control-label" for="check1_2">Αγγελία</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check2_2" name="answer2[]" value="Διαγωνισμός">
                        <label class="custom-control-label" for="check2_2">Διαγωνισμός</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check3_2" name="answer2[]" value="Πρακτική Άσκηση">
                        <label class="custom-control-label" for="check3_2">Πρακτική Άσκηση</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check4_2" name="answer2[]" value="Γραφείο Διασύνδεσης">
                        <label class="custom-control-label" for="check4_2">Γραφείο Διασύνδεσης</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check5_2" name="answer2[]" value="Internet">
                        <label class="custom-control-label" for="check5_2">Internet</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check6_2" name="answer2[]" value="Άλλο">
                        <label class="custom-control-label" for="check6_2">Άλλο</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">3. Αυτή είναι η αρχική θέση εργασίας μετά την αποφοίτησή μου ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio3Yes" name="answer3" value="Ναι">
                        <label class="custom-control-label" for="radio3Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3No" name="answer3" value="Όχι">
                        <label class="custom-control-label" for="radio3No">Όχι</label>
                    </div>
                </div>

                <div class="form-group row mx-0">
                    <label class="col-md-6 col-form-label" for="inputAnswer4">4. Συνολικός χρόνος επαγγελματικής απασχόλησης (μήνες) :</label>
                    <div class="col-md-2">
                        <input class="form-control"  type="text" id="inputAnswer4" name="answer4" value="{{ old('answer4') }}"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">5. Σχέση εργασίας :</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio1_5" name="answer5" value="Εξαρτημένη εργασία">
                        <label class="custom-control-label" for="radio1_5">Εξαρτημένη εργασία</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2_5" name="answer5" value="Ελεύθερος επαγγελματίας">
                        <label class="custom-control-label" for="radio2_5">Ελεύθερος επαγγελματίας</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3_5" name="answer5" value="Άλλο">
                        <label class="custom-control-label" for="radio3_5">Άλλο</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">6. Σε ποιον τομέα εργάζεστε ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio1_6" name="answer6" value="Δημόσιο">
                        <label class="custom-control-label" for="radio1_6">Δημόσιο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2_6" name="answer6" value="Ιδιωτικό">
                        <label class="custom-control-label" for="radio2_6">Ιδιωτικό</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">7. Με ποια ειδικότητα απασχολείστε ;</label>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio1_7" name="answer7" value="Αναλυτής Εφαρμογών">
                        <label class="custom-control-label" for="radio1_7">Αναλυτής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio2_7" name="answer7" value="Αναλυτής Συστημάτων">
                        <label class="custom-control-label" for="radio2_7">Αναλυτής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio3_7" name="answer7" value="Προγραμματιστής Εφαρμογών">
                        <label class="custom-control-label" for="radio3_7">Προγραμματιστής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio4_7" name="answer7" value="Διαχειριστής Δικτύου">
                        <label class="custom-control-label" for="radio4_7">Διαχειριστής Δικτύου</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio5_7" name="answer7" value="Διαχειριστής Βάσεων Δεδομένων">
                        <label class="custom-control-label" for="radio5_7">Διαχειριστής Βάσεων Δεδομένων</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio6_7" name="answer7" value="Προγραμματιστής Συστημάτων">
                        <label class="custom-control-label" for="radio6_7">Προγραμματιστής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio7_7" name="answer7" value="Web developer">
                        <label class="custom-control-label" for="radio7_7">Web developer</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio8_7" name="answer7" value="Service Η/Υ, Αναβαθμίσεις, Υποστήριξη">
                        <label class="custom-control-label" for="radio8_7">Service Η/Υ, Αναβαθμίσεις, Υποστήριξη</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio9_7" name="answer7" value="Εκπαιδευτικός">
                        <label class="custom-control-label" for="radio9_7">Εκπαιδευτικός</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio10_7" name="answer7" value="Άλλο">
                        <label class="custom-control-label" for="radio10_7">Άλλο:</label><input type="text" class="ml-2" id="inputOther7" name="other7">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">8. Έχετε κάποια θέση ευθύνης ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio8Yes" name="answer8" value="Ναι">
                        <label class="custom-control-label" for="radio8Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8No" name="answer8" value="Όχι">
                        <label class="custom-control-label" for="radio8No">Όχι</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-11 offset-md-1">8α. Δημόσιος Τομέας :</label>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio1_8a" name="answer8a" value="Διευθυντής Γυμνασίου/Λυκείου">
                        <label class="custom-control-label" for="radio1_8a">Διευθυντής Γυμνασίου/Λυκείου</label>
                    </div>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio2_8a" name="answer8a" value="Διευθυντής Τομέα">
                        <label class="custom-control-label" for="radio2_8a">Διευθυντής Τομέα</label>
                    </div>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio3_8a" name="answer8a" value="Διευθυντής ΣΕΚ">
                        <label class="custom-control-label" for="radio3_8a">Διευθυντής ΣΕΚ</label>
                    </div>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio4_8a" name="answer8a" value="ΠΛΗΝΕΤ">
                        <label class="custom-control-label" for="radio4_8a">ΠΛΗΝΕΤ</label>
                    </div>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio5_8a" name="answer8a" value="Σύμβουλος Εκπαίδευσης">
                        <label class="custom-control-label" for="radio5_8a">Σύμβουλος Εκπαίδευσης</label>
                    </div>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio6_8a" name="answer8a" value="Προϊστάμενος/Διευθυντής Τμήματος">
                        <label class="custom-control-label" for="radio6_8a">Προϊστάμενος/Διευθυντής Τμήματος</label>
                    </div>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio7_8a" name="answer8a" value="Άλλο">
                        <label class="custom-control-label" for="radio7_8a">Άλλο:</label><input type="text" class="ml-2" id="inputOther8a" name="other8a">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-11 offset-md-1">8β. Ιδιωτικός Τομέας :</label>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio1_8b" name="answer8b" value="Προϊστάμενος/Διευθυντής Τμήματος">
                        <label class="custom-control-label" for="radio1_8b">Προϊστάμενος/Διευθυντής Τμήματος</label>
                    </div>
                    <div class="custom-control custom-radio" style="margin-left: 10%;">
                        <input class="custom-control-input" type="radio" id="radio2_8b" name="answer8b" value="Άλλο">
                        <label class="custom-control-label" for="radio2_8b">Άλλο:</label><input type="text" class="ml-2" id="inputOther8b" name="other8b">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-11 offset-md-1">8γ. Ποια επιπλέον προσόντα απαιτήθηκαν για την κατάληψη της Θέσης Ευθύνης :</label>
                    <div class="custom-control custom-checkbox custom-control-inline" style="margin-left: 10%;">
                        <input type="checkbox" class="custom-control-input" id="check1_8c" name="answer8c[]" value="MSc">
                        <label class="custom-control-label" for="check1_8c">MSc</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check2_8c" name="answer8c[]" value="PhD">
                        <label class="custom-control-label" for="check2_8c">PhD</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check3_8c" name="answer8c[]" value="Άλλο πτυχίο">
                        <label class="custom-control-label" for="check3_8c">Άλλο πτυχίο</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check4_8c" name="answer8c[]" value="Ξένη Γλώσσα">
                        <label class="custom-control-label" for="check4_8c">Ξένη Γλώσσα</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check5_8c" name="answer8c[]" value="Προϋπηρεσία">
                        <label class="custom-control-label" for="check5_8c">Προϋπηρεσία</label>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input" id="check6_8c" name="answer8c[]" value="Άλλο">
                        <label class="custom-control-label" for="check6_8c">Άλλο</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">9. Η ειδικότητά σας (Τίτλος Πτυχίου) ήταν απαραίτητη για την κάλυψη της θέσης ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio9Yes" name="answer9" value="Ναι">
                        <label class="custom-control-label" for="radio9Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9No" name="answer9" value="Όχι">
                        <label class="custom-control-label" for="radio9No">Όχι</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">10. Η Πρακτική σας Άσκησή ήταν σε παρόμοιο χώρο εργασίας ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio10Yes" name="answer10" value="Ναι">
                        <label class="custom-control-label" for="radio10Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10No" name="answer10" value="Όχι">
                        <label class="custom-control-label" for="radio10No">Όχι</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">11. Η Πρακτική σας Άσκησή εκτιμήθηκε ως εμπειρία για τη θέση ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio11Yes" name="answer11" value="Ναι">
                        <label class="custom-control-label" for="radio11Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11No" name="answer11" value="Όχι">
                        <label class="custom-control-label" for="radio11No">Όχι</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">11α. Μήπως στην πρώτη σας εργασία προσληφθήκατε απ’ την εταιρία στην οποία κάνατε την Πρακτική σας Άσκηση ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio11aYes" name="answer11a" value="Ναι">
                        <label class="custom-control-label" for="radio11aYes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11aNo" name="answer11a" value="Όχι">
                        <label class="custom-control-label" for="radio11aNo">Όχι</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">12. Εκτός του πτυχίου είχατε και μεταπτυχιακό τίτλο για τη θέση ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio12Yes" name="answer12" value="Ναι">
                        <label class="custom-control-label" for="radio12Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12No" name="answer12" value="Όχι">
                        <label class="custom-control-label" for="radio12No">Όχι</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">13. Εκτός του πτυχίου διαθέτατε και άλλη εμπειρία σχετική με τη θέση ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio13Yes" name="answer13" value="Ναι">
                        <label class="custom-control-label" for="radio13Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13No" name="answer13" value="Όχι">
                        <label class="custom-control-label" for="radio13No">Όχι</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">14. Πόσο σχετική με το αντικείμενο είναι η θέση απασχόλησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio14None" name="answer14" value="Καθόλου">
                        <label class="custom-control-label" for="radio14None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio14Little" name="answer14" value="Λίγο">
                        <label class="custom-control-label" for="radio14Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio14Enough" name="answer14" value="Αρκετά">
                        <label class="custom-control-label" for="radio14Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio14Very" name="answer14" value="Πολύ">
                        <label class="custom-control-label" for="radio14Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio14VeryMuch" name="answer14" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio14VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">15. Οι θεωρητικές σας γνώσεις κάλυπταν τις απαιτήσεις της θέσης εργασίας ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio15None" name="answer15" value="Καθόλου">
                        <label class="custom-control-label" for="radio15None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio15Little" name="answer15" value="Λίγο">
                        <label class="custom-control-label" for="radio15Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio15Enough" name="answer15" value="Αρκετά">
                        <label class="custom-control-label" for="radio15Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio15Very" name="answer15" value="Πολύ">
                        <label class="custom-control-label" for="radio15Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio15VeryMuch" name="answer15" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio15VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">16. Οι πρακτικές σας γνώσεις κάλυπταν τις απαιτήσεις της θέσης εργασίας ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio16None" name="answer16" value="Καθόλου">
                        <label class="custom-control-label" for="radio16None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio16Little" name="answer16" value="Λίγο">
                        <label class="custom-control-label" for="radio16Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio16Enough" name="answer16" value="Αρκετά">
                        <label class="custom-control-label" for="radio16Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio16Very" name="answer16" value="Πολύ">
                        <label class="custom-control-label" for="radio16Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio16VeryMuch" name="answer16" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio16VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">17. Αν εργάζεστε ως πτυχιούχοι ΤΕΙ, αξιοποιείτε τα αντικείμενα που διδαχθήκατε ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio17None" name="answer17" value="Καθόλου">
                        <label class="custom-control-label" for="radio17None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio17Little" name="answer17" value="Λίγο">
                        <label class="custom-control-label" for="radio17Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio17Enough" name="answer17" value="Αρκετά">
                        <label class="custom-control-label" for="radio17Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio17Very" name="answer17" value="Πολύ">
                        <label class="custom-control-label" for="radio17Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio17VeryMuch" name="answer17" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio17VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">18. Η Πρακτική σας Άσκηση ήταν χρήσιμη σε σχέση με την θέση εργασίας ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio18None" name="answer18" value="Καθόλου">
                        <label class="custom-control-label" for="radio18None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio18Little" name="answer18" value="Λίγο">
                        <label class="custom-control-label" for="radio18Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio18Enough" name="answer18" value="Αρκετά">
                        <label class="custom-control-label" for="radio18Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio18Very" name="answer18" value="Πολύ">
                        <label class="custom-control-label" for="radio18Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio18VeryMuch" name="answer18" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio18VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">19. Είστε ικανοποιημένος με την τωρινή απασχόλησή σας ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio19None" name="answer19" value="Καθόλου">
                        <label class="custom-control-label" for="radio19None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio19Little" name="answer19" value="Λίγο">
                        <label class="custom-control-label" for="radio19Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio19Enough" name="answer19" value="Αρκετά">
                        <label class="custom-control-label" for="radio19Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio19Very" name="answer19" value="Πολύ">
                        <label class="custom-control-label" for="radio19Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio19VeryMuch" name="answer19" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio19VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">20. Είστε ικανοποιημένος με τις σπουδές σας ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio20None" name="answer20" value="Καθόλου">
                        <label class="custom-control-label" for="radio20None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio20Little" name="answer20" value="Λίγο">
                        <label class="custom-control-label" for="radio20Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio20Enough" name="answer20" value="Αρκετά">
                        <label class="custom-control-label" for="radio20Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio20Very" name="answer20" value="Πολύ">
                        <label class="custom-control-label" for="radio20Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio20VeryMuch" name="answer20" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio20VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">21. Είστε ικανοποιημένος με την επαγγελματική σας πορεία ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio21None" name="answer21" value="Καθόλου">
                        <label class="custom-control-label" for="radio21None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio21Little" name="answer21" value="Λίγο">
                        <label class="custom-control-label" for="radio21Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio21Enough" name="answer21" value="Αρκετά">
                        <label class="custom-control-label" for="radio21Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio21Very" name="answer21" value="Πολύ">
                        <label class="custom-control-label" for="radio21Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio21VeryMuch" name="answer21" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio21VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">22. Επιθυμείτε να προχωρήσετε σε μεταπτυχιακό επίπεδο σπουδών ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio22None" name="answer22" value="Καθόλου">
                        <label class="custom-control-label" for="radio22None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio22Little" name="answer22" value="Λίγο">
                        <label class="custom-control-label" for="radio22Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio22Enough" name="answer22" value="Αρκετά">
                        <label class="custom-control-label" for="radio22Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio22Very" name="answer22" value="Πολύ">
                        <label class="custom-control-label" for="radio22Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio22VeryMuch" name="answer22" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio22VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">23. Οι σπουδές σας αποτελούν γερό θεμέλιο για την σταδιοδρομία σας ;</label>
                    <div class="custom-control custom-radio custom-control-inline ml-3">
                        <input class="custom-control-input" type="radio" id="radio23None" name="answer23" value="Καθόλου">
                        <label class="custom-control-label" for="radio23None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio23Little" name="answer23" value="Λίγο">
                        <label class="custom-control-label" for="radio23Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio23Enough" name="answer23" value="Αρκετά">
                        <label class="custom-control-label" for="radio23Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio23Very" name="answer23" value="Πολύ">
                        <label class="custom-control-label" for="radio23Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio23VeryMuch" name="answer23" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio23VeryMuch">Πάρα πολύ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">24. Το ύψος των αμοιβών σας κυμαίνεται (καθαρές αμοιβές) :</label>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio1_24" name="answer24" value="Εώς 800 ευρώ">
                        <label class="custom-control-label" for="radio1_24">Εώς 800 ευρώ</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio2_24" name="answer24" value="Από 801 ως 1500 ευρώ">
                        <label class="custom-control-label" for="radio2_24">Από 801 ως 1500 ευρώ</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio3_24" name="answer24" value="Από 1501 ως 2500 ευρώ">
                        <label class="custom-control-label" for="radio3_24">Από 1501 ως 2500 ευρώ</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio4_24" name="answer24" value="Από 2501 ευρώ και πάνω">
                        <label class="custom-control-label" for="radio4_24">Από 2501 ευρώ και πάνω</label>
                    </div>
                    <div class="custom-control custom-radio ml-3">
                        <input class="custom-control-input" type="radio" id="radio5_24" name="answer24" value="Δεν απαντώ">
                        <label class="custom-control-label" for="radio5_24">Δεν απαντώ</label>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-form-label col-md-12">25. Επιλέξτε μέχρι 5 από τα παρακάτω θεματικά αντικείμενα που διδαχθήκατε και που αποδείχθηκαν πιο ωφέλιμα κατά την εργασία σας.</label>
                    <div class="row">
                        <div class="col-md-4 ml-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check1_25" name="answer_25[]" value="Γλώσσες/Μεθοδολογίες Προγραμματισμού">
                                <label class="custom-control-label" for="check1_25">Γλώσσες/Μεθοδολογίες Προγραμματισμού</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check3_25" name="answer_25[]" value="Λειτουργικά Συστήματα">
                                <label class="custom-control-label" for="check3_25">Λειτουργικά Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-2 pr-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check2_25" name="answer_25[]" value="Αρχιτεκτονική Η/Υ">
                                <label class="custom-control-label" for="check2_25">Αρχιτεκτονική Η/Υ</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check4_25" name="answer_25[]" value="Δίκτυα">
                                <label class="custom-control-label" for="check4_25">Δίκτυα</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ml-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check5_25" name="answer_25[]" value="Οργάνωση Διοίκηση Επιχειρήσεων">
                                <label class="custom-control-label" for="check5_25">Οργάνωση Διοίκηση Επιχειρήσεων</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check6_25" name="answer_25[]" value="Βάσεις Δεδομένων">
                                <label class="custom-control-label" for="check6_25">Βάσεις Δεδομένων</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check7_25" name="answer_25[]" value="Πολυμέσα">
                                <label class="custom-control-label" for="check7_25">Πολυμέσα</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check8_25" name="answer_25[]" value="Διαδίκτυο">
                                <label class="custom-control-label" for="check8_25">Διαδίκτυο</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 ml-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check9_25" name="answer_25[]" value="Τεχνητή Νοημοσύνη/Ευφυή Συστήματα">
                                <label class="custom-control-label" for="check9_25">Τεχνητή Νοημοσύνη/Ευφυή Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check10_25" name="answer_25[]" value="Πληροφοριακά Συστήματα">
                                <label class="custom-control-label" for="check10_25">Πληροφοριακά Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check11_25" name="answer_25[]" value="Γραφικά">
                                <label class="custom-control-label" for="check11_25">Γραφικά</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check12_25" name="answer_25[]" value="Άλλο">
                                <label class="custom-control-label" for="check12_25">Άλλο</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="form-navigation d-flex justify-content-around px-5">
                <button id="previousBtn" type="button" name="previous_btn" class="previous btn btn-success rounded-pill"><i class="fas fa-chevron-left"></i> Πίσω</button>
                <button id="submitBtn" type="submit" name="submit_btn" class="btn btn-success rounded-pill">Υποβολή <i class="far fa-paper-plane"></i></button>
                <button id="nextBtn" type="button" name="next_btn" class="next btn btn-success rounded-pill">Επόμενο</button>
            </div>
            
        </form>
    </div>
</div>
@endsection
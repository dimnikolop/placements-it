@extends('layouts.app')

@section('content')
<div class="container">
    <div id="" class="card custom-main-card">
        <div class="card-body">
            <h5 class="card-title my-5 text-center">ΕΡΩΤΗΜΑΤΟΛΟΓΙΟ ΑΞΙΟΛΟΓΗΣΗΣ ΤΗΣ ΠΡΑΚΤΙΚΗΣ ΑΣΚΗΣΗΣ<br/>ΑΠΟ ΤΟΝ ΕΡΓΑΣΙΑΚΟ ΕΠΙΒΛΕΠΟΝΤΑ</h5>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            <form id="companyQuestionnaireForm" action="{{ route('questionnaires.company.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-lg-3 col-form-label text-md-right" for="supervisorName">Όνομα Επιβλέποντα :<span class="required">*</span></label>
                    <div class="col-md-7 col-lg-8">
                        <input class="form-control @error('supervisor') is-invalid @enderror" type="text" id="supervisorName" name="supervisor" value="{{ old('supervisor') }}"/>
                        @error('supervisor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row align-items-center">
                    <label class="col-md-4 col-lg-3 col-form-label text-md-right" for="studentName">Όνομα Ασκούμενου Φοιτητή :<span class="required">*</span></label>
                    <div class="col-md-7 col-lg-8">
                        <input class="form-control @error('student') is-invalid @enderror" type="text" id="studentName" name="student" value="{{ old('student') }}"/>
                        @error('student')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label class="col-md-4 col-lg-3 col-form-label text-md-right" for="companyName">Φορέας Απασχόλησης :<span class="required">*</span></label>
                    <div class="col-md-7 col-lg-8">
                        <input class="form-control @error('company') is-invalid @enderror" type="text" id="companyName" name="company" value="{{ old('company') }}"/>
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label class="col-md-12 col-lg-3 col-form-label text-lg-right">Διάρκεια Απασχόλησης :<span class="required">*</span></label>
                    <label class="col-3 col-lg-1 offset-sm-1 offset-lg-0 col-form-label">Από:</label>
                    <div class="col-9 col-sm-6 col-lg-3 mb-1 mb-lg-0">
                        <div class="input-group" data-toggle="tooltip" title="Ημερομηνία έναρξης"> 
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control @error('start_date') is-invalid @enderror" type="text" id="startDate" name="start_date" value="{{ old('start_date') }}" placeholder="DD/MM/YYYY"/>
                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <label class="col-3 col-lg-auto col-xl-1 offset-sm-1 offset-lg-0 col-form-label">Μέχρι:</label>
                    <div class="col-9 col-sm-6 col-lg-3">
                        <div class="input-group" data-toggle="tooltip" title="Ημερομηνία λήξης">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control @error('end_date') is-invalid @enderror" type="text" id="endDate" name="end_date" value="{{ old('end_date') }}" placeholder="DD/MM/YYYY"/>
                            @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
    
                <div class="well"><em>
                    Σας παρακαλούμε θερμά να συμπληρώσετε το παρόν ερωτηματολόγιο με τη δέουσα προσοχή και ειλικρίνεια. 
                    Οι απαντήσεις σας θα ληφθούν σοβαρά υπόψη και θα συμβάλουν στην ουσιαστική βελτίωση της ποιότητας του θεσμού της πρακτικής άσκησης, 
                    προς το κοινό όφελος όλων των φορέων που συμμετέχουν. Σας διαβεβαιώνουμε ότι τα προσωπικά σας δεδομένα και οι απαντήσεις σας είναι 
                    εμπιστευτικές και δεν πρόκειται να διαβιβαστούν σε τρίτους.
                </em></div>
    
                <div class="form-group">
                    <label class="d-block">1. Πόσο σχετικός με το γνωστικό αντικείμενο του Τμήματος ήταν ο φορέας (επιχείρηση/οργανισμός/υπηρεσία) στον οποίο τοποθετήθηκε ο ασκούμενος ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1None" name="question1" value="Καθόλου" @if (old('question1') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio1None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Little" name="question1" value="Λίγο" @if (old('question1') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio1Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Enough" name="question1" value="Αρκετά" @if (old('question1') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio1Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Very" name="question1" value="Πολύ" @if (old('question1') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio1Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1VeryMuch" name="question1" value="Πάρα πολύ" @if (old('question1') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio1VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question1')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">2. Πόσο σχετική με το γνωστικό αντικείμενο του Τμήματος ήταν η θέση απασχόλησης στην οποία τοποθετήθηκε ο ασκούμενος ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2None" name="question2" value="Καθόλου" @if (old('question2') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio2None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Little" name="question2" value="Λίγο" @if (old('question2') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio2Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Enough" name="question2" value="Αρκετά" @if (old('question2') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio2Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Very" name="question2" value="Πολύ" @if (old('question2') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio2Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2VeryMuch" name="question2" value="Πάρα πολύ" @if (old('question2') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio2VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question2')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">3. Με ποια ιδιότητα απασχολήθηκε ο ασκούμενος ;</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio1_3" name="question3" value="Αναλυτής Εφαρμογών" @if (old('question3') == 'Αναλυτής Εφαρμογών') checked @endif>
                        <label class="custom-control-label" for="radio1_3">Αναλυτής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio2_3" name="question3" value="Αναλυτής Συστημάτων" @if (old('question3') == 'Αναλυτής Συστημάτων') checked @endif>
                        <label class="custom-control-label" for="radio2_3">Αναλυτής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio3_3" name="question3" value="Προγραμματιστής Εφαρμογών" @if (old('question3') == 'Προγραμματιστής Εφαρμογών') checked @endif>
                        <label class="custom-control-label" for="radio3_3">Προγραμματιστής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio4_3" name="question3" value="Διαχειριστής Δικτύου" @if (old('question3') == 'Διαχειριστής Δικτύου') checked @endif>
                        <label class="custom-control-label" for="radio4_3">Διαχειριστής Δικτύου</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio5_3" name="question3" value="Διαχειριστής Βάσεων Δεδομένων" @if (old('question3') == 'Διαχειριστής Βάσεων Δεδομένων') checked @endif>
                        <label class="custom-control-label" for="radio5_3">Διαχειριστής Βάσεων Δεδομένων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio6_3" name="question3" value="Προγραμματιστής Συστημάτων" @if (old('question3') == 'Προγραμματιστής Συστημάτων') checked @endif>
                        <label class="custom-control-label" for="radio6_3">Προγραμματιστής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio7_3" name="question3" value="Web developer" @if (old('question3') == 'Web developer') checked @endif>
                        <label class="custom-control-label" for="radio7_3">Web developer</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio8_3" name="question3" value="Service Η/Υ" @if (old('question3') == 'Service Η/Υ') checked @endif>
                        <label class="custom-control-label" for="radio8_3">Service Η/Υ</label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="radio9_3" name="question3" value="Άλλο" @if (old('question3') == 'Άλλο') checked @endif>
                                <label class="custom-control-label" for="radio9_3">Άλλο:</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control form-control-sm @error('other3') is-invalid @enderror" id="inputOther3" name="other3" value="{{ old('other3') }}">
                            @error('other3')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @error('question3')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">4. Πόσο καλή ήταν η συνεργασία σας με τον ακαδημαϊκό επόπτη του ασκούμενου ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4None" name="question4" value="Καθόλου" @if (old('question4') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio4None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Little" name="question4" value="Λίγο" @if (old('question4') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio4Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Enough" name="question4" value="Αρκετά" @if (old('question4') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio4Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Very" name="question4" value="Πολύ" @if (old('question4') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio4Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4VeryMuch" name="question4" value="Πάρα πολύ" @if (old('question4') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio4VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question4')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">5. Πόσο ικανοποιημένος είστε από την απόδοση του ασκούμενου ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5None" name="question5" value="Καθόλου" @if (old('question5') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio5None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Little" name="question5" value="Λίγο" @if (old('question5') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio5Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Enough" name="question5" value="Αρκετά" @if (old('question5') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio5Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Very" name="question5" value="Πολύ" @if (old('question5') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio5Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5VeryMuch" name="question5" value="Πάρα πολύ" @if (old('question5') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio5VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question5')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">6. Είστε ικανοποιημένος από τη συνεργασία του ασκούμενου με τους υπόλοιπους συναδέλφους της επιχείρησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6None" name="question6" value="Καθόλου" @if (old('question6') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio6None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Little" name="question6" value="Λίγο" @if (old('question6') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio6Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Enough" name="question6" value="Αρκετά" @if (old('question6') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio6Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Very" name="question6" value="Πολύ" @if (old('question6') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio6Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6VeryMuch" name="question6" value="Πάρα πολύ" @if (old('question6') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio6VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question6')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">7. Σε ποιο βαθμό πιστεύετε ότι θα βοηθήσει τον ασκούμενο η εμπειρία που απέκτησε στην επαγγελματική του εξέλιξη ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7None" name="question7" value="Καθόλου" @if (old('question7') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio7None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Little" name="question7" value="Λίγο" @if (old('question7') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio7Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Enough" name="question7" value="Αρκετά" @if (old('question7') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio7Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Very" name="question7" value="Πολύ" @if (old('question7') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio7Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7VeryMuch" name="question7" value="Πάρα πολύ" @if (old('question7') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio7VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question7')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">8. Θεωρείτε ότι οι θεωρητικές γνώσεις που έλαβε ο ασκούμενος από το Τμήμα ήταν επαρκείς ώστε να αντεπεξέλθει στις απαιτήσεις της εργασίας του ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8None" name="question8" value="Καθόλου" @if (old('question8') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio8None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Little" name="question8" value="Λίγο" @if (old('question8') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio8Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Enough" name="question8" value="Αρκετά" @if (old('question8') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio8Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Very" name="question8" value="Πολύ" @if (old('question8') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio8Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8VeryMuch" name="question8" value="Πάρα πολύ" @if (old('question8') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio8VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question8')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">9. Θεωρείτε ότι οι πρακτικές γνώσεις που έλαβε ο ασκούμενος από το Τμήμα ήταν επαρκείς ώστε να αντεπεξέλθει στις απαιτήσεις της εργασίας του ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9None" name="question9" value="Καθόλου" @if (old('question9') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio9None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Little" name="question9" value="Λίγο" @if (old('question9') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio9Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Enough" name="question9" value="Αρκετά" @if (old('question9') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio9Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Very" name="question9" value="Πολύ" @if (old('question9') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio9Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9VeryMuch" name="question9" value="Πάρα πολύ" @if (old('question9') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio9VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question9')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">10. Σε ποιο βαθμό πιστεύετε ότι βοήθησε τον ασκούμενο το υπόβαθρο γνώσεων που απέκτησε από το Τμήμα, ώστε να ανταποκριθεί στις απαιτήσεις της εργασίας του ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10None" name="question10" value="Καθόλου" @if (old('question10') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio10None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Little" name="question10" value="Λίγο" @if (old('question10') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio10Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Enough" name="question10" value="Αρκετά" @if (old('question10') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio10Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Very" name="question10" value="Πολύ" @if (old('question10') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio10Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10VeryMuch" name="question10" value="Πάρα πολύ" @if (old('question10') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio10VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question10')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">11. Θα προτείνατε την τοποθέτηση και άλλων σπουδαστών στην επιχείρηση/υπηρεσία/οργανισμό ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11None" name="question11" value="Καθόλου" @if (old('question11') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio11None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Little" name="question11" value="Λίγο" @if (old('question11') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio11Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Enough" name="question11" value="Αρκετά" @if (old('question11') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio11Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Very" name="question11" value="Πολύ" @if (old('question11') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio11Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11VeryMuch" name="question11" value="Πάρα πολύ" @if (old('question11') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio11VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question11')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">12. Προσλάβατε τον ασκούμενο στο φορέα σας μετά το πέρας της πρακτικής του άσκησης ;</label>
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
    
                <div class="form-group mb-5">
                    <label class="d-block">13. Ενδιαφέρεστε να προσλάβετε τον ασκούμενο στο φορέα  σας μετά το πέρας της πρακτικής του άσκησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13None" name="question13" value="Καθόλου" @if (old('question13') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio13None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13Little" name="question13" value="Λίγο" @if (old('question13') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio13Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13Enough" name="question13" value="Αρκετά" @if (old('question13') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio13Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13Very" name="question13" value="Πολύ" @if (old('question13') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio13Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13VeryMuch" name="question13" value="Πάρα πολύ" @if (old('question13') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio13VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question13')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="text-center mb-4">
                    <button id="submitBtn" type="submit" name="submit_btn" class="btn btn-success">Υποβολή  <i class="far fa-paper-plane"></i></button>
                </div>
                
                <h5 class="text-center">Σας ευχαριστούμε για τον χρόνο που διαθέσατε!</h5>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <div id="" class="card">
        <div class="card-body">
            <div class="card-title my-5 text-center"><h5>ΕΡΩΤΗΜΑΤΟΛΟΓΙΟ ΑΞΙΟΛΟΓΗΣΗΣ ΤΗΣ ΠΡΑΚΤΙΚΗΣ ΑΣΚΗΣΗΣ<br/>ΑΠΟ ΤΟΝ ΕΡΓΑΣΙΑΚΟ ΕΠΙΒΛΕΠΟΝΤΑ</h5></div>
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
                        <input class="custom-control-input" type="radio" id="radio1None" name="answer1" value="Καθόλου" @if (old('answer1') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio1None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Little" name="answer1" value="Λίγο" @if (old('answer1') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio1Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Enough" name="answer1" value="Αρκετά" @if (old('answer1') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio1Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Very" name="answer1" value="Πολύ" @if (old('answer1') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio1Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1VeryMuch" name="answer1" value="Πάρα πολύ" @if (old('answer1') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio1VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer1')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">2. Πόσο σχετική με το γνωστικό αντικείμενο του Τμήματος ήταν η θέση απασχόλησης στην οποία τοποθετήθηκε ο ασκούμενος ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2None" name="answer2" value="Καθόλου" @if (old('answer2') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio2None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Little" name="answer2" value="Λίγο" @if (old('answer2') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio2Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Enough" name="answer2" value="Αρκετά" @if (old('answer2') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio2Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Very" name="answer2" value="Πολύ" @if (old('answer2') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio2Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2VeryMuch" name="answer2" value="Πάρα πολύ" @if (old('answer2') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio2VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer2')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">3. Με ποια ιδιότητα απασχολήθηκε ο ασκούμενος ;</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio1_3" name="answer3" value="Αναλυτής Εφαρμογών" @if (old('answer3') == 'Αναλυτής Εφαρμογών') checked @endif>
                        <label class="custom-control-label" for="radio1_3">Αναλυτής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio2_3" name="answer3" value="Αναλυτής Συστημάτων" @if (old('answer3') == 'Αναλυτής Συστημάτων') checked @endif>
                        <label class="custom-control-label" for="radio2_3">Αναλυτής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio3_3" name="answer3" value="Προγραμματιστής Εφαρμογών" @if (old('answer3') == 'Προγραμματιστής Εφαρμογών') checked @endif>
                        <label class="custom-control-label" for="radio3_3">Προγραμματιστής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio4_3" name="answer3" value="Διαχειριστής Δικτύου" @if (old('answer3') == 'Διαχειριστής Δικτύου') checked @endif>
                        <label class="custom-control-label" for="radio4_3">Διαχειριστής Δικτύου</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio5_3" name="answer3" value="Διαχειριστής Βάσεων Δεδομένων" @if (old('answer3') == 'Διαχειριστής Βάσεων Δεδομένων') checked @endif>
                        <label class="custom-control-label" for="radio5_3">Διαχειριστής Βάσεων Δεδομένων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio6_3" name="answer3" value="Προγραμματιστής Συστημάτων" @if (old('answer3') == 'Προγραμματιστής Συστημάτων') checked @endif>
                        <label class="custom-control-label" for="radio6_3">Προγραμματιστής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio7_3" name="answer3" value="Web developer" @if (old('answer3') == 'Web developer') checked @endif>
                        <label class="custom-control-label" for="radio7_3">Web developer</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio8_3" name="answer3" value="Service Η/Υ" @if (old('answer3') == 'Service Η/Υ') checked @endif>
                        <label class="custom-control-label" for="radio8_3">Service Η/Υ</label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="radio9_3" name="answer3" value="Άλλο" @if (old('answer3') == 'Άλλο') checked @endif>
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
                    @error('answer3')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">4. Πόσο καλή ήταν η συνεργασία σας με τον ακαδημαϊκό επόπτη του ασκούμενου ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4None" name="answer4" value="Καθόλου" @if (old('answer4') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio4None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Little" name="answer4" value="Λίγο" @if (old('answer4') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio4Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Enough" name="answer4" value="Αρκετά" @if (old('answer4') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio4Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Very" name="answer4" value="Πολύ" @if (old('answer4') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio4Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4VeryMuch" name="answer4" value="Πάρα πολύ" @if (old('answer4') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio4VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer4')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">5. Πόσο ικανοποιημένος είστε από την απόδοση του ασκούμενου ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5None" name="answer5" value="Καθόλου" @if (old('answer5') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio5None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Little" name="answer5" value="Λίγο" @if (old('answer5') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio5Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Enough" name="answer5" value="Αρκετά" @if (old('answer5') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio5Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Very" name="answer5" value="Πολύ" @if (old('answer5') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio5Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5VeryMuch" name="answer5" value="Πάρα πολύ" @if (old('answer5') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio5VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer5')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">6. Είστε ικανοποιημένος από τη συνεργασία του ασκούμενου με τους υπόλοιπους συναδέλφους της επιχείρησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6None" name="answer6" value="Καθόλου" @if (old('answer6') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio6None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Little" name="answer6" value="Λίγο" @if (old('answer6') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio6Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Enough" name="answer6" value="Αρκετά" @if (old('answer6') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio6Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Very" name="answer6" value="Πολύ" @if (old('answer6') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio6Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6VeryMuch" name="answer6" value="Πάρα πολύ" @if (old('answer6') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio6VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer6')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">7. Σε ποιο βαθμό πιστεύετε ότι θα βοηθήσει τον ασκούμενο η εμπειρία που απέκτησε στην επαγγελματική του εξέλιξη ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7None" name="answer7" value="Καθόλου" @if (old('answer7') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio7None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Little" name="answer7" value="Λίγο" @if (old('answer7') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio7Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Enough" name="answer7" value="Αρκετά" @if (old('answer7') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio7Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Very" name="answer7" value="Πολύ" @if (old('answer7') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio7Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7VeryMuch" name="answer7" value="Πάρα πολύ" @if (old('answer7') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio7VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer7')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">8. Θεωρείτε ότι οι θεωρητικές γνώσεις που έλαβε ο ασκούμενος από το Τμήμα ήταν επαρκείς ώστε να αντεπεξέλθει στις απαιτήσεις της εργασίας του ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8None" name="answer8" value="Καθόλου" @if (old('answer8') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio8None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Little" name="answer8" value="Λίγο" @if (old('answer8') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio8Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Enough" name="answer8" value="Αρκετά" @if (old('answer8') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio8Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Very" name="answer8" value="Πολύ" @if (old('answer8') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio8Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8VeryMuch" name="answer8" value="Πάρα πολύ" @if (old('answer8') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio8VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer8')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">9. Θεωρείτε ότι οι πρακτικές γνώσεις που έλαβε ο ασκούμενος από το Τμήμα ήταν επαρκείς ώστε να αντεπεξέλθει στις απαιτήσεις της εργασίας του ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9None" name="answer9" value="Καθόλου" @if (old('answer9') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio9None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Little" name="answer9" value="Λίγο" @if (old('answer9') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio9Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Enough" name="answer9" value="Αρκετά" @if (old('answer9') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio9Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Very" name="answer9" value="Πολύ" @if (old('answer9') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio9Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9VeryMuch" name="answer9" value="Πάρα πολύ" @if (old('answer9') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio9VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer9')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">10. Σε ποιο βαθμό πιστεύετε ότι βοήθησε τον ασκούμενο το υπόβαθρο γνώσεων που απέκτησε από το Τμήμα, ώστε να ανταποκριθεί στις απαιτήσεις της εργασίας του ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10None" name="answer10" value="Καθόλου" @if (old('answer10') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio10None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Little" name="answer10" value="Λίγο" @if (old('answer10') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio10Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Enough" name="answer10" value="Αρκετά" @if (old('answer10') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio10Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Very" name="answer10" value="Πολύ" @if (old('answer10') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio10Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10VeryMuch" name="answer10" value="Πάρα πολύ" @if (old('answer10') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio10VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer10')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">11. Θα προτείνατε την τοποθέτηση και άλλων σπουδαστών στην επιχείρηση/υπηρεσία/οργανισμό ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11None" name="answer11" value="Καθόλου" @if (old('answer11') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio11None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Little" name="answer11" value="Λίγο" @if (old('answer11') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio11Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Enough" name="answer11" value="Αρκετά" @if (old('answer11') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio11Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Very" name="answer11" value="Πολύ" @if (old('answer11') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio11Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11VeryMuch" name="answer11" value="Πάρα πολύ" @if (old('answer11') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio11VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer11')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">12. Προσλάβατε τον ασκούμενο στο φορέα σας μετά το πέρας της πρακτικής του άσκησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12Yes" name="answer12" value="Ναι" @if (old('answer12') == 'Ναι') checked @endif>
                        <label class="custom-control-label" for="radio12Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12No" name="answer12" value="Όχι" @if (old('answer12') == 'Όχι') checked @endif>
                        <label class="custom-control-label" for="radio12No">Όχι</label>
                    </div>
                    @error('answer12')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-5">
                    <label class="d-block">13. Ενδιαφέρεστε να προσλάβετε τον ασκούμενο στο φορέα  σας μετά το πέρας της πρακτικής του άσκησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13None" name="answer13" value="Καθόλου" @if (old('answer13') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio13None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13Little" name="answer13" value="Λίγο" @if (old('answer13') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio13Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13Enough" name="answer13" value="Αρκετά" @if (old('answer13') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio13Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13Very" name="answer13" value="Πολύ" @if (old('answer13') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio13Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13VeryMuch" name="answer13" value="Πάρα πολύ" @if (old('answer13') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio13VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer13')
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
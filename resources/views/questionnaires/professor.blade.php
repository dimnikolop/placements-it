@extends('layouts.app')

@section('content')
<div class="container">
    <div id="" class="card">
        <div class="card-body">
            <div class="crad-title my-5 text-center"><h5>ΕΡΩΤΗΜΑΤΟΛΟΓΙΟ ΑΞΙΟΛΟΓΗΣΗΣ ΤΗΣ ΠΡΑΚΤΙΚΗΣ ΑΣΚΗΣΗΣ ΦΟΙΤΗΤΗ<br/>ΑΠΟ ΤΟΝ ΑΚΑΔΗΜΑΙΚΟ ΕΠΟΠΤΗ ΤΟΥ ΤΜΗΜΑΤΟΣ</h5></div>
            <form id="professorQuestionnaireForm" action="{{ route('questionnaires.professor.store') }}" method="post">
                @csrf
                <div class="form-group row align-items-center">
                    <label class="col-md-4 col-lg-3 col-form-label text-md-right" for="studentName">Όνομα Ασκούμενου Φοιτητή :<span class="required">*</span></label>
                    <div class="col-md-7 col-lg-8">
                        <input class="form-control @error('student') is-invalid @enderror" type="text" id="studentName" name="student"/>
                        @error('student')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label class="col-md-4 col-lg-3 col-form-label text-md-right" for="registerNumber" title="Αριθμός Μητρώου">AM :<span class="required">*</span></label>
                    <div class="col-6 col-sm-4 col-lg-2">
                        <input class="form-control @error('AM') is-invalid @enderror" type="text" id="registerNumber" name="AM"/>
                        @error('AM')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label class="col-md-4 col-lg-3 col-form-label text-md-right" for="companyName">Φορέας Απασχόλησης :<span class="required">*</span></label>
                    <div class="col-md-7 col-lg-8">
                        <input class="form-control @error('company') is-invalid @enderror" type="text" id="companyName" name="company"/>
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row align-items-center">
                    <label class="col-md-4 col-lg-3 col-form-label text-md-right" for="supervisorName">Όνομα Ακαδημαϊκού Επόπτη :<span class="required">*</span></label>
                    <div class="col-md-7 col-lg-8">
                        <input class="form-control @error('supervisor') is-invalid @enderror" type="text" id="supervisorName" name="supervisor"/>
                        @error('supervisor')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
    
                <div class="form-group row">
                    <label class="col-md-12 col-lg-3 col-form-label text-lg-right">Διάρκεια Απασχόλησης :<span class="required">*</span></label>
                    <label class="col-3 col-lg-1 offset-sm-1 offset-lg-0 col-form-label">Από:</label>
                    <div class="col-9 col-sm-7 col-lg-3 mb-1 mb-lg-0 input-group"> 
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input class="form-control @error('date_from') is-invalid @enderror" type="date" id="dateFrom" name="date_from"/>
                        @error('date_from')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <label class="col-3 col-lg-auto col-xl-1 offset-sm-1 offset-lg-0 col-form-label">Μέχρι:</label>
                    <div class="col-9 col-sm-7 col-lg-3 input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input class="form-control @error('date_to') is-invalid @enderror" type="date" id="dateTo" name="date_to"/>
                        @error('date_to')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
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
                        <input class="custom-control-input" type="radio" id="radio1None" name="answer1" value="Καθόλου">
                        <label class="custom-control-label" for="radio1None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Little" name="answer1" value="Λίγο">
                        <label class="custom-control-label" for="radio1Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Enough" name="answer1" value="Αρκετά">
                        <label class="custom-control-label" for="radio1Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1Very" name="answer1" value="Πολύ">
                        <label class="custom-control-label" for="radio1Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1VeryMuch" name="answer1" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio1VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer1')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">2. Πόσο σχετική με το γνωστικό αντικείμενο του Τμήματος ήταν η θέση απασχόλησης στην οποία τοποθετήθηκε ο ασκούμενος ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2None" name="answer2" value="Καθόλου">
                        <label class="custom-control-label" for="radio2None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Little" name="answer2" value="Λίγο">
                        <label class="custom-control-label" for="radio2Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Enough" name="answer2" value="Αρκετά">
                        <label class="custom-control-label" for="radio2Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Very" name="answer2" value="Πολύ">
                        <label class="custom-control-label" for="radio2Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2VeryMuch" name="answer2" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio2VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer2')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">3. Ήταν το αντικείμενο εργασίας του/της ασκούμενου/ης σαφές και καθορισμένο ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3None" name="answer3" value="Καθόλου">
                        <label class="custom-control-label" for="radio3None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3Little" name="answer3" value="Λίγο">
                        <label class="custom-control-label" for="radio3Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3Enough" name="answer3" value="Αρκετά">
                        <label class="custom-control-label" for="radio3Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3Very" name="answer3" value="Πολύ">
                        <label class="custom-control-label" for="radio3Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3VeryMuch" name="answer3" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio3VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer3')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">4. Πόσο ικανοποιητική ήταν η εκπαίδευση του/της ασκούμενου/ης από τον εργασιακό Επιβλέποντα ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4None" name="answer4" value="Καθόλου">
                        <label class="custom-control-label" for="radio4None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Little" name="answer4" value="Λίγο">
                        <label class="custom-control-label" for="radio4Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Enough" name="answer4" value="Αρκετά">
                        <label class="custom-control-label" for="radio4Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4Very" name="answer4" value="Πολύ">
                        <label class="custom-control-label" for="radio4Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4VeryMuch" name="answer4" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio4VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer4')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">5. Πόσο ικανοποιητική κρίνετε την καθοδήγηση του/της ασκούμενου/ης από τον εργασιακό Επιβλέποντα ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5None" name="answer5" value="Καθόλου">
                        <label class="custom-control-label" for="radio5None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Little" name="answer5" value="Λίγο">
                        <label class="custom-control-label" for="radio5Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Enough" name="answer5" value="Αρκετά">
                        <label class="custom-control-label" for="radio5Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Very" name="answer5" value="Πολύ">
                        <label class="custom-control-label" for="radio5Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5VeryMuch" name="answer5" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio5VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer5')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">6. Πόσο καλή ήταν η συνεργασία σας με τον εργασιακό Επιβλέποντα του φορέα ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6None" name="answer6" value="Καθόλου">
                        <label class="custom-control-label" for="radio6None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Little" name="answer6" value="Λίγο">
                        <label class="custom-control-label" for="radio6Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Enough" name="answer6" value="Αρκετά">
                        <label class="custom-control-label" for="radio6Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Very" name="answer6" value="Πολύ">
                        <label class="custom-control-label" for="radio6Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6VeryMuch" name="answer6" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio6VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer6')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">7. Πόσο ικανοποιημένο κρίνατε τον εργασιακό Επιβλέποντα από την απόδοση του/της ασκούμενου/ης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7None" name="answer7" value="Καθόλου">
                        <label class="custom-control-label" for="radio7None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Little" name="answer7" value="Λίγο">
                        <label class="custom-control-label" for="radio7Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Enough" name="answer7" value="Αρκετά">
                        <label class="custom-control-label" for="radio7Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Very" name="answer7" value="Πολύ">
                        <label class="custom-control-label" for="radio7Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7VeryMuch" name="answer7" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio7VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer7')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">8. Πόσο ικανοποιητική κρίνατε τη συνεργασία του/της ασκούμενου/ης με τους υπόλοιπους εργαζομένους του φορέα ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8None" name="answer8" value="Καθόλου">
                        <label class="custom-control-label" for="radio8None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Little" name="answer8" value="Λίγο">
                        <label class="custom-control-label" for="radio8Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Enough" name="answer8" value="Αρκετά">
                        <label class="custom-control-label" for="radio8Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Very" name="answer8" value="Πολύ">
                        <label class="custom-control-label" for="radio8Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8VeryMuch" name="answer8" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio8VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer8')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">9. Πόσο ικανοποιητικό κρίνατε τον εξοπλισμό του χώρου στον οποίο εργάζεται ο/η ασκούμενος/η ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9None" name="answer9" value="Καθόλου">
                        <label class="custom-control-label" for="radio9None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Little" name="answer9" value="Λίγο">
                        <label class="custom-control-label" for="radio9Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Enough" name="answer9" value="Αρκετά">
                        <label class="custom-control-label" for="radio9Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Very" name="answer9" value="Πολύ">
                        <label class="custom-control-label" for="radio9Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9VeryMuch" name="answer9" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio9VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer9')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">10. Πόσο καλές κρίνατε τις συνθήκες εργασίας του/της ασκούμενου/ης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10None" name="answer10" value="Καθόλου">
                        <label class="custom-control-label" for="radio10None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Little" name="answer10" value="Λίγο">
                        <label class="custom-control-label" for="radio10Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Enough" name="answer10" value="Αρκετά">
                        <label class="custom-control-label" for="radio10Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Very" name="answer10" value="Πολύ">
                        <label class="custom-control-label" for="radio10Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10VeryMuch" name="answer10" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio10VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer10')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">11. Σε ποιο βαθμό πιστεύετε ότι θα βοηθήσει τον/την ασκούμενο/η η εμπειρία που απέκτησε στην επαγγελματική του/της εξέλιξη ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11None" name="answer11" value="Καθόλου">
                        <label class="custom-control-label" for="radio11None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Little" name="answer11" value="Λίγο">
                        <label class="custom-control-label" for="radio11Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Enough" name="answer11" value="Αρκετά">
                        <label class="custom-control-label" for="radio11Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Very" name="answer11" value="Πολύ">
                        <label class="custom-control-label" for="radio11Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11VeryMuch" name="answer11" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio11VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer11')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group mb-5">
                    <label class="d-block">12. Θα προτείνατε την τοποθέτηση και άλλων ασκούμενων στην επιχείρηση/υπηρεσία/οργανισμό ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12None" name="answer12" value="Καθόλου">
                        <label class="custom-control-label" for="radio12None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12Little" name="answer12" value="Λίγο">
                        <label class="custom-control-label" for="radio12Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12Enough" name="answer12" value="Αρκετά">
                        <label class="custom-control-label" for="radio12Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12Very" name="answer12" value="Πολύ">
                        <label class="custom-control-label" for="radio12Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12VeryMuch" name="answer12" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio12VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer12')
                        <div class="invalid-feedback d-block d-md-inline">{{ $message }}</div>
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
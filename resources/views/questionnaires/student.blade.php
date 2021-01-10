@extends('layouts.app')

@section('content')
<div class="container">
    <div id="" class="card custom-main-card">
        <div class="card-body">
            <div class="card-title my-5 text-center"><h5>ΕΡΩΤΗΜΑΤΟΛΟΓΙΟ ΑΞΙΟΛΟΓΗΣΗΣ ΤΗΣ ΠΡΑΚΤΙΚΗΣ ΑΣΚΗΣΗΣ <br> ΑΠΟ ΤΟΝ ΑΣΚΟΥΜΕΝΟ ΦΟΙΤΗΤΗ</h5></div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            <form id="studentQuestionnaireForm" action="{{ route('questionnaires.student.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label class="col-md-4 col-lg-3 col-form-label text-lg-right" for="inputCompany">Φορέας Απασχόλησης :<span class="required">*</span></label>
                    <div class="col-md-8 col-lg-8">
                        <input class="form-control @error('company') is-invalid @enderror" type="text" id="inputCompany" name="company" value="{{ old('company') }}"/>
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="form-group row">
                    <label class="col-md-12 col-lg-3 col-form-label text-lg-right">Διάρκεια Απασχόλησης :<span class="required">*</span></label>
                    <label class="col-3 col-lg-1 offset-sm-1 offset-lg-0 col-form-label">Από:</label>
                    <div class="col-9 col-sm-6 col-lg-3 mb-2 mb-lg-0">
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
            
                <div class="form-group row">
                    <label class="col-md-auto col-lg-3 col-form-label text-lg-right">Εξάμηνο :<span class="required">*</span></label>
                    <div class="col-md-auto px-md-0 px-lg-3 pt-2 mb-2">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio1Semester" name="semester" value="Χειμερινό" @if (old('semester') == 'Χειμερινό') checked @endif>
                            <label class="custom-control-label" for="radio1Semester">Χειμερινό</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input" type="radio" id="radio2Semester" name="semester" value="Εαρινό" @if (old('semester') == 'Εαρινό') checked @endif>
                            <label class="custom-control-label" for="radio2Semester">Εαρινό</label>
                        </div>
                        @error('semester')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                        <div class="input-group"> 
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control @error('year_from') is-invalid @enderror" type="text" id="yearFrom" name="year_from" value="{{ old('year_from') }}" placeholder="YYYY"/>
                            @error('year_from')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-auto px-md-0 px-lg-3">
                        <label class="col-form-label">&mdash;</label>
                    </div>
                    <div class="col-5 col-sm-4 col-md-3 col-lg-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control @error('year_to') is-invalid @enderror" type="text" id="yearTo" name="year_to" value="{{ old('year_to') }}" placeholder="YYYY"/>
                            @error('year_to')
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
                    <label class="d-block">1. Πόσο ικανοποιητική θεωρείτε την ενημέρωση που σας παρείχε το Γραφείο Πρακτικής Άσκησης για την έναρξη της Πρακτικής σας Άσκησης ;</label>
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
                    <label class="d-block">2. Πόσο ικανοποιητική θεωρείτε την βοήθεια που σας παρείχε το Γραφείο Πρακτικής Άσκησης κατά τη διάρκεια της Πρακτικής σας Άσκησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2None" name="question2" value="Καθόλου" @if (old('question2') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio2None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2Little" name="question2" value="Λίγο"  @if (old('question2') == 'Λίγο') checked @endif>
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
                    <label class="d-block">3. Είστε ικανοποιημένος από την επιλογή του φορέα διεκπεραίωσης της Πρακτικής σας Άσκησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3None" name="question3" value="Καθόλου" @if (old('question3') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio3None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3Little" name="question3" value="Λίγο"  @if (old('question3') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio3Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3Enough" name="question3" value="Αρκετά" @if (old('question3') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio3Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3Very" name="question3" value="Πολύ" @if (old('question3') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio3Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3VeryMuch" name="question3" value="Πάρα πολύ" @if (old('question3') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio3VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question3')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">4. Η τελική επιλογή του φορέα πραγματοποιήθηκε με βάση :</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio1_4" name="question4" value="Προσωπικές γνωριμίες" @if (old('question4') == 'Προσωπικές γνωριμίες') checked @endif>
                        <label class="custom-control-label" for="radio1_4">Προσωπικές γνωριμίες</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio2_4" name="question4" value="Συνέντευξη" @if (old('question4') == 'Συνέντευξη') checked @endif>
                        <label class="custom-control-label" for="radio2_4">Συνέντευξη</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio3_4" name="question4" value="Ιστοσελίδα Τμήματος" @if (old('question4') == 'Ιστοσελίδα Τμήματος') checked @endif>
                        <label class="custom-control-label" for="radio3_4">Ιστοσελίδα Τμήματος</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio4_4" name="question4" value="Συστάσεις από καθηγητές" @if (old('question4') == 'Συστάσεις από καθηγητές') checked @endif>
                        <label class="custom-control-label" for="radio4_4">Συστάσεις από καθηγητές</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio5_4" name="question4" value="Συστάσεις από τρίτους" @if (old('question4') == 'Συστάσεις από τρίτους') checked @endif>
                        <label class="custom-control-label" for="radio5_4">Συστάσεις από τρίτους</label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="radio6_4" name="question4" value="Άλλο" @if (old('question4') == 'Άλλο') checked @endif>
                                <label class="custom-control-label" for="radio6_4">Άλλο:</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control form-control-sm @error('other4') is-invalid @enderror" id="inputOther4" name="other4" value="{{ old('other4') }}">
                            @error('other4')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @error('question4')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">5. Ήταν το αντικείμενο εργασίας σας σαφές και καθορισμένο ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5None" name="question5" value="Καθόλου" @if (old('question5') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio5None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5Little" name="question5" value="Λίγο"  @if (old('question5') == 'Λίγο') checked @endif>
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
                    <label class="d-block">6. Πόσο καλή ήταν η συνεργασία σας με τον εργασιακό Επιβλέποντα του φορέα ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6None" name="question6" value="Καθόλου" @if (old('question6') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio6None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio6Little" name="question6" value="Λίγο"  @if (old('question6') == 'Λίγο') checked @endif>
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
                    <label class="d-block">7. Πόσο συχνά επικοινωνείτε με τον εργασιακό Επιβλέποντα του φορέα ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7None" name="question7" value="Καθόλου" @if (old('question7') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio7None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio7Little" name="question7" value="Λίγο"  @if (old('question7') == 'Λίγο') checked @endif>
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
                    <label class="d-block">8. Είστε επιμελής (και εσείς και ο Επιβλέπων)  στην τήρηση του Βιβλιάριου Πρακτικής Άσκησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8None" name="question8" value="Καθόλου" @if (old('question8') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio8None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio8Little" name="question8" value="Λίγο"  @if (old('question8') == 'Λίγο') checked @endif>
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
                    <label class="d-block">9. Είστε ικανοποιημένος από τη συνεργασία σας με τους υπόλοιπους συναδέλφους της επιχείρησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9None" name="question9" value="Καθόλου" @if (old('question9') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio9None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio9Little" name="question9" value="Λίγο"  @if (old('question9') == 'Λίγο') checked @endif>
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
                    <label class="d-block">10. Σε ποιο βαθμό, εκτός από το κύριο αντικείμενο εργασίας, εκτελούσατε περιστασιακά και άλλες άσχετες με το αντικείμενο δραστηριότητες ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10None" name="question10" value="Καθόλου" @if (old('question10') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio10None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio10Little" name="question10" value="Λίγο"  @if (old('question10') == 'Λίγο') checked @endif>
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
                    <label class="d-block">11. Είστε ικανοποιημένος από το μισθό σας ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11None" name="question11" value="Καθόλου" @if (old('question11') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio11None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio11Little" name="question11" value="Λίγο"  @if (old('question11') == 'Λίγο') checked @endif>
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
                    <label class="d-block">12. Κάνετε υπερωρίες κατά την Πρακτική σας Άσκηση ;</label>
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
                    <label class="d-block">13. Σε περίπτωση που κάνετε υπερωρίες, υπάρχει επιπρόσθετη αμοιβή ;</label>
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
                    <label class="d-block">14. Πόσες ώρες την εβδομάδα – εκτός ωραρίου – απ’ τον ελεύθερο χρόνο σας αφιερώσατε ώστε να ανταποκριθείτε στις απαιτήσεις της εργασίας σας :</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1_14" name="question14" value="0 ώρες" @if (old('question14') == '0 ώρες') checked @endif>
                        <label class="custom-control-label" for="radio1_14">0 ώρες</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2_14" name="question14" value="1-2 ώρες" @if (old('question14') == '1-2 ώρες') checked @endif>
                        <label class="custom-control-label" for="radio2_14">1-2 ώρες</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3_14" name="question14" value="3-6 ώρες" @if (old('question14') == '3-6 ώρες') checked @endif>
                        <label class="custom-control-label" for="radio3_14">3-6 ώρες</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4_14" name="question14" value="7-10 ώρες" @if (old('question14') == '7-10 ώρες') checked @endif>
                        <label class="custom-control-label" for="radio4_14">7-10 ώρες</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5_14" name="question14" value="πάνω από 10 ώρες" @if (old('question14') == 'πάνω από 10 ώρες') checked @endif>
                        <label class="custom-control-label" for="radio5_14">πάνω από 10 ώρες</label>
                    </div>
                    @error('question14')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">15. Με ποια ιδιότητα απασχοληθήκατε :</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio1_15" name="question15" value="Αναλυτής Εφαρμογών" @if (old('question15') == 'Αναλυτής Εφαρμογών') checked @endif>
                        <label class="custom-control-label" for="radio1_15">Αναλυτής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio2_15" name="question15" value="Αναλυτής Συστημάτων" @if (old('question15') == 'Αναλυτής Συστημάτων') checked @endif>
                        <label class="custom-control-label" for="radio2_15">Αναλυτής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio3_15" name="question15" value="Προγραμματιστής Εφαρμογών" @if (old('question15') == 'Προγραμματιστής Εφαρμογών') checked @endif>
                        <label class="custom-control-label" for="radio3_15">Προγραμματιστής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio4_15" name="question15" value="Διαχειριστής Δικτύου" @if (old('question15') == 'Διαχειριστής Δικτύου') checked @endif>
                        <label class="custom-control-label" for="radio4_15">Διαχειριστής Δικτύου</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio5_15" name="question15" value="Διαχειριστής Βάσεων Δεδομένων" @if (old('question15') == 'Διαχειριστής Βάσεων Δεδομένων') checked @endif>
                        <label class="custom-control-label" for="radio5_15">Διαχειριστής Βάσεων Δεδομένων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio6_15" name="question15" value="Προγραμματιστής Συστημάτων" @if (old('question15') == 'Προγραμματιστής Συστημάτων') checked @endif>
                        <label class="custom-control-label" for="radio6_15">Προγραμματιστής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio7_15" name="question15" value="Web developer" @if (old('question15') == 'Web developer') checked @endif>
                        <label class="custom-control-label" for="radio7_15">Web developer</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio8_15" name="question15" value="Service Η/Υ" @if (old('question15') == 'Service Η/Υ') checked @endif>
                        <label class="custom-control-label" for="radio8_15">Service Η/Υ</label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="radio9_15" name="question15" value="Άλλο" @if (old('question15') == 'Άλλο') checked @endif>
                                <label class="custom-control-label" for="radio9_15">Άλλο:</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control form-control-sm @error('other15') is-invalid @enderror" id="inputOther15" name="other15" value="{{ old('other15') }}">
                            @error('other15')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @error('question15')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">16. Πόσο καλή ήταν η συνεργασία σας με τον Ακαδημαϊκό Επόπτη ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio16None" name="question16" value="Καθόλου" @if (old('question16') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio16None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio16Little" name="question16" value="Λίγο"  @if (old('question16') == 'Λίγο') checked @endif>
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
                    <label class="d-block">17. Θεωρείτε ότι οι θεωρητικές γνώσεις που λάβατε από το Τμήμα σας ήταν επαρκείς ώστε να αντεπεξέλθετε στις απαιτήσεις της εργασίας σας ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio17None" name="question17" value="Καθόλου" @if (old('question17') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio17None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio17Little" name="question17" value="Λίγο"  @if (old('question17') == 'Λίγο') checked @endif>
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
                    <label class="d-block">18. Θεωρείτε ότι οι πρακτικές γνώσεις που λάβατε από το Τμήμα σας ήταν επαρκείς ώστε να αντεπεξέλθετε στις απαιτήσεις της εργασίας σας ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio18None" name="question18" value="Καθόλου" @if (old('question18') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio18None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio18Little" name="question18" value="Λίγο"  @if (old('question18') == 'Λίγο') checked @endif>
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
                    <label class="d-block">19. Σε ποιο βαθμό απασχοληθήκατε με κάποιο αντικείμενο, το οποίο δεν είχατε διδαχθεί ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio19None" name="question19" value="Καθόλου" @if (old('question19') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio19None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio19Little" name="question19" value="Λίγο"  @if (old('question19') == 'Λίγο') checked @endif>
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
                    <label class="d-block">20. Σε ποιο βαθμό σας βοήθησε το υπόβαθρο γνώσεων που αποκτήσατε στο Τμήμα, ώστε να ανταποκριθείτε στις απαιτήσεις του αντικειμένου που  δεν είχατε διδαχθεί;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio20None" name="question20" value="Καθόλου" @if (old('question20') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio20None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio20Little" name="question20" value="Λίγο"  @if (old('question20') == 'Λίγο') checked @endif>
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
                    <label class="d-block">
                        21. Επιλέξτε μέχρι 5 από τα παρακάτω θεματικά αντικείμενα που διδαχθήκατε και που αποδείχθηκαν πιο ωφέλιμα κατά την πρακτική σας άσκηση. 
                        <span class="font-weight-normal font-italic">
                            (Παρακαλούμε σημειώστε τα 5 αντικείμενα με αριθμούς από το <mark>1</mark> έως το <mark>5</mark> για να δηλώσετε τη σειρά σημαντικότητας, θέτοντας το <mark>1 στο πιο σημαντικό</mark>)
                        </span>
                    </label>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check1_21" name="question21[]" value="Γλώσσες/Μεθοδολογίες Προγραμματισμού" @if (old('question21') && in_array('Γλώσσες/Μεθοδολογίες Προγραμματισμού', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check1_21">Γλώσσες/Μεθοδολογίες Προγραμματισμού</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check2_21" name="question21[]" value="Λειτουργικά Συστήματα" @if (old('question21') && in_array('Λειτουργικά Συστήματα', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check2_21">Λειτουργικά Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check3_21" name="question21[]" value="Αρχιτεκτονική Η/Υ" @if (old('question21') && in_array('Αρχιτεκτονική Η/Υ', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check3_21">Αρχιτεκτονική Η/Υ</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check4_21" name="question21[]" value="Δίκτυα" @if (old('question21') && in_array('Δίκτυα', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check4_21">Δίκτυα</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check5_21" name="question21[]" value="Οργάνωση Διοίκηση Επιχειρήσεων" @if (old('question21') && in_array('Οργάνωση Διοίκηση Επιχειρήσεων', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check5_21">Οργάνωση Διοίκηση Επιχειρήσεων</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check6_21" name="question21[]" value="Βάσεις Δεδομένων" @if (old('question21') && in_array('Βάσεις Δεδομένων', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check6_21">Βάσεις Δεδομένων</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check7_21" name="question21[]" value="Πολυμέσα" @if (old('question21') && in_array('Πολυμέσα', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check7_21">Πολυμέσα</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check8_21" name="question21[]" value="Διαδίκτυο" @if (old('question21') && in_array('Διαδίκτυο', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check8_21">Διαδίκτυο</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check9_21" name="question21[]" value="Τεχνητή Νοημοσύνη/Ευφυή Συστήματα" @if (old('question21') && in_array('Τεχνητή Νοημοσύνη/Ευφυή Συστήματα', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check9_21">Τεχνητή Νοημοσύνη/Ευφυή Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check10_21" name="question21[]" value="Πληροφοριακά Συστήματα" @if (old('question21') && in_array('Πληροφοριακά Συστήματα', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check10_21">Πληροφοριακά Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check11_21" name="question21[]" value="Γραφικά" @if (old('question21') && in_array('Γραφικά', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check11_21">Γραφικά</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check12_21" name="question21[]" value="Άλλο" @if (old('question21') && in_array('Άλλο', old('question21'))) checked @endif>
                                <label class="custom-control-label" for="check12_21">Άλλο</label>
                            </div>
                        </div>
                    </div>
                    @error('question21')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">22. Επιλέξτε μέχρι 3 θεματικά αντικείμενα που <mark>δεν</mark> διδαχθήκατε και που από την εμπειρία που αποκτήσατε στην πρακτική σας άσκηση θεωρείτε πως είναι απαραίτητο να προστεθούν στο Πρόγραμμα Σπουδών του Τμήματος.</label>
                    <div class="row align-items-center">
                        <label class="col-form-label col-auto">1.</label>
                        <div class="col col-xl-8">
                            <input class="form-control form-control-sm" type="text" id="subject1" name="question22[]" value="{{ old('question22.0') }}">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <label class="col-form-label col-auto">2.</label>
                        <div class="col col-xl-8">
                            <input class="form-control form-control-sm" type="text" id="subject2" name="question22[]" value="{{ old('question22.1') }}">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <label class="col-form-label col-auto">3.</label>
                        <div class="col col-xl-8">
                            <input class="form-control form-control-sm" type="text" id="subject3" name="question22[]" value="{{ old('question22.2') }}">
                        </div>
                    </div>
                    @error('question22')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">23. Σε ποιο βαθμό εμπλουτίστηκαν οι γνώσεις σας από την Πρακτική σας Άσκηση ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio23None" name="question23" value="Καθόλου" @if (old('question23') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio23None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio23Little" name="question23" value="Λίγο"  @if (old('question23') == 'Λίγο') checked @endif>
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
                    <label class="d-block">24. Σε ποιο βαθμό πιστεύετε ότι θα σας βοηθήσει η εμπειρία που αποκτήσατε στην επαγγελματική σας εξέλιξη ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24None" name="question24" value="Καθόλου" @if (old('question24') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio24None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24Little" name="question24" value="Λίγο"  @if (old('question24') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio24Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24Enough" name="question24" value="Αρκετά" @if (old('question24') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio24Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24Very" name="question24" value="Πολύ" @if (old('question24') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio24Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24VeryMuch" name="question24" value="Πάρα πολύ" @if (old('question24') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio24VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question24')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">25. Προσληφθήκατε στο φορέα, στον οποίο κάνατε την πρακτική σας άσκηση ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio25Yes" name="question25" value="Ναι" @if (old('question25') == 'Ναι') checked @endif>
                        <label class="custom-control-label" for="radio25Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio25No" name="question25" value="Όχι" @if (old('question25') == 'Όχι') checked @endif>
                        <label class="custom-control-label" for="radio25No">Όχι</label>
                    </div>
                    @error('question25')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group mb-5">
                    <label class="d-block">26. Εκδηλώθηκε ενδιαφέρον απ’ το φορέα  για πρόσληψη μετά το πέρας της πρακτικής άσκησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26None" name="question26" value="Καθόλου" @if (old('question26') == 'Καθόλου') checked @endif>
                        <label class="custom-control-label" for="radio26None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26Little" name="question26" value="Λίγο"  @if (old('question26') == 'Λίγο') checked @endif>
                        <label class="custom-control-label" for="radio26Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26Enough" name="question26" value="Αρκετά" @if (old('question26') == 'Αρκετά') checked @endif>
                        <label class="custom-control-label" for="radio26Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26Very" name="question26" value="Πολύ" @if (old('question26') == 'Πολύ') checked @endif>
                        <label class="custom-control-label" for="radio26Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26VeryMuch" name="question26" value="Πάρα πολύ" @if (old('question26') == 'Πάρα πολύ') checked @endif>
                        <label class="custom-control-label" for="radio26VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('question26')
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
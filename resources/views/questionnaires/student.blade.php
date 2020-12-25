@extends('layouts.app')

@section('content')
<div class="container">
    <div id="" class="card">
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
                    <label class="col-md-4 col-lg-3 col-form-label text-md-right" for="inputCompany">Φορέας Απασχόλησης :<span class="required">*</span></label>
                    <div class="col-md-7 col-lg-8">
                        <input class="form-control @error('company') is-invalid @enderror" type="text" id="inputCompany" name="company"/>
                        @error('company')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            
                <div class="form-group row">
                    <label class="col-md-12 col-lg-3 col-form-label text-lg-right">Διάρκεια Απασχόλησης :<span class="required">*</span></label>
                    <label class="col-3 col-lg-1 offset-sm-1 offset-lg-0 col-form-label">Από:</label>
                    <div class="col-9 col-sm-7 col-lg-3 mb-1 mb-lg-0">
                        <div class="input-group" data-toggle="tooltip" title="Ημερομηνία έναρξης"> 
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control @error('start_date') is-invalid @enderror" type="text" id="startDate" name="start_date" placeholder="DD/MM/YYYY"/>
                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <label class="col-3 col-lg-auto col-xl-1 offset-sm-1 offset-lg-0 col-form-label">Μέχρι:</label>
                    <div class="col-9 col-sm-7 col-lg-3">
                        <div class="input-group" data-toggle="tooltip" title="Ημερομηνία λήξης">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control @error('end_date') is-invalid @enderror" type="text" id="endDate" name="end_date" placeholder="DD/MM/YYYY"/>
                            @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            
                <div class="form-group row">
                    <label class="col-md-2 col-lg-3 col-form-label text-lg-right">Εξάμηνο :<span class="required">*</span></label>
                    <div class="col-md-auto mb-1 my-auto">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input @error('semester') is-invalid @enderror" type="radio" id="radio1Semester" name="semester" value="Χειμερινό">
                            <label class="custom-control-label" for="radio1Semester">Χειμερινό</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input class="custom-control-input @error('semester') is-invalid @enderror" type="radio" id="radio2Semester" name="semester" value="Εαρινό">
                            <label class="custom-control-label" for="radio2Semester">Εαρινό</label>
                        </div>
                        @error('semester')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-5 col-sm-4 col-md-2">
                        <div class="input-group"> 
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control @error('year_from') is-invalid @enderror" type="text" id="yearFrom" name="year_from" placeholder="YYYY"/>
                            @error('year_from')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-auto">
                        <label class="col-form-label">&mdash;</label>
                    </div>
                    <div class="col-5 col-sm-4 col-md-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            </div>
                            <input class="form-control @error('year_to') is-invalid @enderror" type="text" id="yearTo" name="year_to" placeholder="YYYY"/>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="form-group">
                    <label class="d-block">2. Πόσο ικανοποιητική θεωρείτε την βοήθεια που σας παρείχε το Γραφείο Πρακτικής Άσκησης κατά τη διάρκεια της Πρακτικής σας Άσκησης ;</label>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">3. Είστε ικανοποιημένος από την επιλογή του φορέα διεκπεραίωσης της Πρακτικής σας Άσκησης ;</label>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">4. Η τελική επιλογή του φορέα πραγματοποιήθηκε με βάση :</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio1_4" name="answer4" value="Προσωπικές γνωριμίες">
                        <label class="custom-control-label" for="radio1_4">Προσωπικές γνωριμίες</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio2_4" name="answer4" value="Συνέντευξη">
                        <label class="custom-control-label" for="radio2_4">Συνέντευξη</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio3_4" name="answer4" value="Ιστοσελίδα Τμήματος">
                        <label class="custom-control-label" for="radio3_4">Ιστοσελίδα Τμήματος</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio4_4" name="answer4" value="Συστάσεις από καθηγητές">
                        <label class="custom-control-label" for="radio4_4">Συστάσεις από καθηγητές</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio5_4" name="answer4" value="Συστάσεις από τρίτους">
                        <label class="custom-control-label" for="radio5_4">Συστάσεις από τρίτους</label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="radio6_4" name="answer4" value="Άλλο">
                                <label class="custom-control-label" for="radio6_4">Άλλο:</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control form-control-sm @error('other4') is-invalid @enderror" id="inputOther4" name="other4">
                            @error('other4')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @error('answer4')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">5. Ήταν το αντικείμενο εργασίας σας σαφές και καθορισμένο ;</label>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">7. Πόσο συχνά επικοινωνείτε με τον εργασιακό Επιβλέποντα του φορέα ;</label>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">8. Είστε επιμελής (και εσείς και ο Επιβλέπων)  στην τήρηση του Βιβλιάριου Πρακτικής Άσκησης ;</label>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">9. Είστε ικανοποιημένος από τη συνεργασία σας με τους υπόλοιπους συναδέλφους της επιχείρησης ;</label>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">10. Σε ποιο βαθμό, εκτός από το κύριο αντικείμενο εργασίας, εκτελούσατε περιστασιακά και άλλες άσχετες με το αντικείμενο δραστηριότητες ;</label>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">11. Είστε ικανοποιημένος από το μισθό σας ;</label>
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
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">12. Κάνετε υπερωρίες κατά την Πρακτική σας Άσκηση ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12Yes" name="answer12" value="Ναι">
                        <label class="custom-control-label" for="radio12Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio12No" name="answer12" value="Όχι">
                        <label class="custom-control-label" for="radio12No">Όχι</label>
                    </div>
                    @error('answer12')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">13. Σε περίπτωση που κάνετε υπερωρίες, υπάρχει επιπρόσθετη αμοιβή ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13Yes" name="answer13" value="Ναι">
                        <label class="custom-control-label" for="radio13Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio13No" name="answer13" value="Όχι">
                        <label class="custom-control-label" for="radio13No">Όχι</label>
                    </div>
                    @error('answer13')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">14. Πόσες ώρες την εβδομάδα – εκτός ωραρίου – απ’ τον ελεύθερο χρόνο σας αφιερώσατε ώστε να ανταποκριθείτε στις απαιτήσεις της εργασίας σας :</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio1_14" name="answer14" value="0 ώρες">
                        <label class="custom-control-label" for="radio1_14">0 ώρες</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio2_14" name="answer14" value="1-2 ώρες">
                        <label class="custom-control-label" for="radio2_14">1-2 ώρες</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio3_14" name="answer14" value="3-6 ώρες">
                        <label class="custom-control-label" for="radio3_14">3-6 ώρες</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio4_14" name="answer14" value="7-10 ώρες">
                        <label class="custom-control-label" for="radio4_14">7-10 ώρες</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio5_14" name="answer14" value="πάνω από 10 ώρες">
                        <label class="custom-control-label" for="radio5_14">πάνω από 10 ώρες</label>
                    </div>
                    @error('answer14')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">15. Με ποια ιδιότητα απασχοληθήκατε :</label>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio1_15" name="answer15" value="Αναλυτής Εφαρμογών">
                        <label class="custom-control-label" for="radio1_15">Αναλυτής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio2_15" name="answer15" value="Αναλυτής Συστημάτων">
                        <label class="custom-control-label" for="radio2_15">Αναλυτής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio3_15" name="answer15" value="Προγραμματιστής Εφαρμογών">
                        <label class="custom-control-label" for="radio3_15">Προγραμματιστής Εφαρμογών</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio4_15" name="answer15" value="Διαχειριστής Δικτύου">
                        <label class="custom-control-label" for="radio4_15">Διαχειριστής Δικτύου</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio5_15" name="answer15" value="Διαχειριστής Βάσεων Δεδομένων">
                        <label class="custom-control-label" for="radio5_15">Διαχειριστής Βάσεων Δεδομένων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio6_15" name="answer15" value="Προγραμματιστής Συστημάτων">
                        <label class="custom-control-label" for="radio6_15">Προγραμματιστής Συστημάτων</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio7_15" name="answer15" value="Web developer">
                        <label class="custom-control-label" for="radio7_15">Web developer</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="radio8_15" name="answer15" value="Service Η/Υ">
                        <label class="custom-control-label" for="radio8_15">Service Η/Υ</label>
                    </div>
                    <div class="row">
                        <div class="col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="radio9_15" name="answer15" value="Άλλο">
                                <label class="custom-control-label" for="radio9_15">Άλλο:</label>
                            </div>
                        </div>
                        <div class="col-auto">
                            <input type="text" class="form-control form-control-sm @error('other15') is-invalid @enderror" id="inputOther15" name="other15">
                            @error('other15')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    @error('answer15')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">16. Πόσο καλή ήταν η συνεργασία σας με τον Ακαδημαϊκό Επόπτη ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
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
                    @error('answer16')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">17. Θεωρείτε ότι οι θεωρητικές γνώσεις που λάβατε από το Τμήμα σας ήταν επαρκείς ώστε να αντεπεξέλθετε στις απαιτήσεις της εργασίας σας ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
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
                    @error('answer17')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">18. Θεωρείτε ότι οι πρακτικές γνώσεις που λάβατε από το Τμήμα σας ήταν επαρκείς ώστε να αντεπεξέλθετε στις απαιτήσεις της εργασίας σας ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
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
                    @error('answer18')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">19. Σε ποιο βαθμό απασχοληθήκατε με κάποιο αντικείμενο, το οποίο δεν είχατε διδαχθεί ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
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
                    @error('answer19')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">20. Σε ποιο βαθμό σας βοήθησε το υπόβαθρο γνώσεων που αποκτήσατε στο Τμήμα, ώστε να ανταποκριθείτε στις απαιτήσεις του αντικειμένου που  δεν είχατε διδαχθεί;</label>
                    <div class="custom-control custom-radio custom-control-inline">
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
                    @error('answer20')
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
                                <input type="checkbox" class="custom-control-input" id="check1_21" name="answer21[]" value="Γλώσσες/Μεθοδολογίες Προγραμματισμού">
                                <label class="custom-control-label" for="check1_21">Γλώσσες/Μεθοδολογίες Προγραμματισμού</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check3_21" name="answer21[]" value="Λειτουργικά Συστήματα">
                                <label class="custom-control-label" for="check3_21">Λειτουργικά Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check2_21" name="answer21[]" value="Αρχιτεκτονική Η/Υ">
                                <label class="custom-control-label" for="check2_21">Αρχιτεκτονική Η/Υ</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check4_21" name="answer21[]" value="Δίκτυα">
                                <label class="custom-control-label" for="check4_21">Δίκτυα</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check5_21" name="answer21[]" value="Οργάνωση Διοίκηση Επιχειρήσεων">
                                <label class="custom-control-label" for="check5_21">Οργάνωση Διοίκηση Επιχειρήσεων</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check6_21" name="answer21[]" value="Βάσεις Δεδομένων">
                                <label class="custom-control-label" for="check6_21">Βάσεις Δεδομένων</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check7_21" name="answer21[]" value="Πολυμέσα">
                                <label class="custom-control-label" for="check7_21">Πολυμέσα</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check8_21" name="answer21[]" value="Διαδίκτυο">
                                <label class="custom-control-label" for="check8_21">Διαδίκτυο</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-lg-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check9_21" name="answer21[]" value="Τεχνητή Νοημοσύνη/Ευφυή Συστήματα">
                                <label class="custom-control-label" for="check9_21">Τεχνητή Νοημοσύνη/Ευφυή Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check10_21" name="answer21[]" value="Πληροφοριακά Συστήματα">
                                <label class="custom-control-label" for="check10_21">Πληροφοριακά Συστήματα</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check11_21" name="answer21[]" value="Γραφικά">
                                <label class="custom-control-label" for="check11_21">Γραφικά</label>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-2">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="check12_21" name="answer21[]" value="Άλλο">
                                <label class="custom-control-label" for="check12_21">Άλλο</label>
                            </div>
                        </div>
                    </div>
                    @error('answer21')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">22. Επιλέξτε μέχρι 3 θεματικά αντικείμενα που <mark>δεν</mark> διδαχθήκατε και που από την εμπειρία που αποκτήσατε στην πρακτική σας άσκηση θεωρείτε πως είναι απαραίτητο να προστεθούν στο Πρόγραμμα Σπουδών του Τμήματος.</label>
                    <div class="row align-items-center">
                        <label class="col-form-label col-auto">1.</label>
                        <div class="col col-xl-8">
                            <input class="form-control form-control-sm" type="text" id="subject1" name="answer22[]">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <label class="col-form-label col-auto">2.</label>
                        <div class="col col-xl-8">
                            <input class="form-control form-control-sm" type="text" id="subject2" name="answer22[]">
                        </div>
                    </div>
                    <div class="row align-items-center">
                        <label class="col-form-label col-auto">3.</label>
                        <div class="col col-xl-8">
                            <input class="form-control form-control-sm" type="text" id="subject3" name="answer22[]">
                        </div>
                    </div>
                    @error('answer22')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">23. Σε ποιο βαθμό εμπλουτίστηκαν οι γνώσεις σας από την Πρακτική σας Άσκηση ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
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
                    @error('answer23')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">24. Σε ποιο βαθμό πιστεύετε ότι θα σας βοηθήσει η εμπειρία που αποκτήσατε στην επαγγελματική σας εξέλιξη ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24None" name="answer24" value="Καθόλου">
                        <label class="custom-control-label" for="radio24None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24Little" name="answer24" value="Λίγο">
                        <label class="custom-control-label" for="radio24Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24Enough" name="answer24" value="Αρκετά">
                        <label class="custom-control-label" for="radio24Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24Very" name="answer24" value="Πολύ">
                        <label class="custom-control-label" for="radio24Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio24VeryMuch" name="answer24" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio24VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer24')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group">
                    <label class="d-block">25. Προσληφθήκατε στο φορέα, στον οποίο κάνατε την πρακτική σας άσκηση ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio25Yes" name="answer25" value="Ναι">
                        <label class="custom-control-label" for="radio25Yes">Ναι</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio25No" name="answer25" value="Όχι">
                        <label class="custom-control-label" for="radio25No">Όχι</label>
                    </div>
                    @error('answer25')
                        <div class="invalid-feedback d-block d-lg-inline">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="form-group mb-5">
                    <label class="d-block">26. Εκδηλώθηκε ενδιαφέρον απ’ το φορέα  για πρόσληψη μετά το πέρας της πρακτικής άσκησης ;</label>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26None" name="answer26" value="Καθόλου">
                        <label class="custom-control-label" for="radio26None">Καθόλου</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26Little" name="answer26" value="Λίγο">
                        <label class="custom-control-label" for="radio26Little">Λίγο</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26Enough" name="answer26" value="Αρκετά">
                        <label class="custom-control-label" for="radio26Enough">Αρκετά</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26Very" name="answer26" value="Πολύ">
                        <label class="custom-control-label" for="radio26Very">Πολύ</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input class="custom-control-input" type="radio" id="radio26VeryMuch" name="answer26" value="Πάρα πολύ">
                        <label class="custom-control-label" for="radio26VeryMuch">Πάρα πολύ</label>
                    </div>
                    @error('answer26')
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
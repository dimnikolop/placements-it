@extends('layouts.app')

@section('content')
<div class="container">
    <div id="questionnaireForm">
        <h5 class="text-center mb-5">ΕΡΩΤΗΜΑΤΟΛΟΓΙΟ ΑΞΙΟΛΟΓΗΣΗΣ ΤΗΣ ΠΡΑΚΤΙΚΗΣ ΑΣΚΗΣΗΣ<br/>ΑΠΟ ΤΟΝ ΑΣΚΟΥΜΕΝΟ ΦΟΙΤΗΤΗ</h5>
   
        <form id="studentQuestionnaireForm" action="" method="post">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right" for="companyName">Φορέας Απασχόλησης :<span class="required">*</span></label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="companyName" name="company"/>
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Διάρκεια Απασχόλησης :<span class="required">*</span></label>
                <div class="col-sm-1">
                    <label class="col-form-label">Από:</label>
                </div>
                <div class="col-sm-3">
                    <div class="input-group"> 
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input class="form-control" id="date1" name="dateFrom" placeholder="DD-MM-YYYY" type="date"/>
                    </div>
                </div>
                <div class="col-sm-1">
                    <label class="col-form-label">Μέχρι:</label>
                </div>
                <div class="col-sm-3">
                    <div class="input-group"> 
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input class="form-control" id="date2" name="dateTo" placeholder="DD-MM-YYYY" type="date"/>
                    </div>
                </div>
            </div>
        
            <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right">Εξάμηνο :<span class="required">*</span></label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioSemester" value="Χειμερινό">
                    <label class="form-check-label">Χειμερινό</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="radioSemester" value="Εαρινό">
                    <label class="form-check-label">Εαρινό</label>
                </div>
                <div class="col-sm-2">
                    <div class="input-group"> 
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input class="form-control" type="text" id="year1" name="yearFrom" placeholder="YYYY"/>
                    </div>
                </div>
                <div class="col-sm-1 text-center">
                    <label class="col-form-label">&mdash;</label>
                </div>
                <div class="col-sm-2">
                    <div class="input-group"> <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        <input class="form-control" type="text" id="year2" name="yearTo" placeholder="YYYY"/>
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
                <label class="col-form-label col-md-12">1. Πόσο ικανοποιητική θεωρείτε την ενημέρωση που σας παρείχε το Γραφείο Πρακτικής Άσκησης για την έναρξη της Πρακτικής σας Άσκησης ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio1None" name="optRadio1" value="Καθόλου">
                    <label class="custom-control-label" for="radio1None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio1Little" name="optRadio1" value="Λίγο">
                    <label class="custom-control-label" for="radio1Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio1Enough" name="optRadio1" value="Αρκετά">
                    <label class="custom-control-label" for="radio1Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio1Very" name="optRadio1" value="Πολύ">
                    <label class="custom-control-label" for="radio1Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio1VeryMuch" name="optRadio1" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio1VeryMuch">Πάρα πολύ</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label col-md-12">2. Πόσο ικανοποιητική θεωρείτε την βοήθεια που σας παρείχε το Γραφείο Πρακτικής Άσκησης κατά τη διάρκεια της Πρακτικής σας Άσκησης ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio2None" name="optRadio2" value="Καθόλου">
                    <label class="custom-control-label" for="radio2None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio2Little" name="optRadio2" value="Λίγο">
                    <label class="custom-control-label" for="radio2Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio2Enough" name="optRadio2" value="Αρκετά">
                    <label class="custom-control-label" for="radio2Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio2Very" name="optRadio2" value="Πολύ">
                    <label class="custom-control-label" for="radio2Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio2VeryMuch" name="optRadio2" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio2VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">3. Είστε ικανοποιημένος από την επιλογή του φορέα διεκπεραίωσης της Πρακτικής σας Άσκησης ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio3None" name="optRadio3" value="Καθόλου">
                    <label class="custom-control-label" for="radio3None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio3Little" name="optRadio3" value="Λίγο">
                    <label class="custom-control-label" for="radio3Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio3Enough" name="optRadio3" value="Αρκετά">
                    <label class="custom-control-label" for="radio3Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio3Very" name="optRadio3" value="Πολύ">
                    <label class="custom-control-label" for="radio3Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio3VeryMuch" name="optRadio3" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio3VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">4. Η τελική επιλογή του φορέα πραγματοποιήθηκε με βάση :</label>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio1_4" name="optRadio4" value="Προσωπικές γνωριμίες">
                    <label class="custom-control-label" for="radio1_4">Προσωπικές γνωριμίες</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio2_4" name="optRadio4" value="Συνέντευξη">
                    <label class="custom-control-label" for="radio2_4">Συνέντευξη</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio3_4" name="optRadio4" value="Ιστοσελίδα Τμήματος">
                    <label class="custom-control-label" for="radio3_4">Ιστοσελίδα Τμήματος</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio4_4" name="optRadio4" value="Συστάσεις από καθηγητές">
                    <label class="custom-control-label" for="radio4_4">Συστάσεις από καθηγητές</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio5_4" name="optRadio4" value="Συστάσεις από τρίτους">
                    <label class="custom-control-label" for="radio5_4">Συστάσεις από τρίτους</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio6_4" name="optRadio4" value="Άλλο">
                    <label class="custom-control-label" for="radio6_4">Άλλο:</label><input type="text" class="ml-2" id="inputOther4" name="other4">
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">5. Ήταν το αντικείμενο εργασίας σας σαφές και καθορισμένο ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio5None" name="optRadio5" value="Καθόλου">
                    <label class="custom-control-label" for="radio5None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio5Little" name="optRadio5" value="Λίγο">
                    <label class="custom-control-label" for="radio5Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio5Enough" name="optRadio5" value="Αρκετά">
                    <label class="custom-control-label" for="radio5Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio5Very" name="optRadio5" value="Πολύ">
                    <label class="custom-control-label" for="radio5Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio5VeryMuch" name="optRadio5" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio5VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">6. Πόσο καλή ήταν η συνεργασία σας με τον εργασιακό Επιβλέποντα του φορέα ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio6None" name="optRadio6" value="Καθόλου">
                    <label class="custom-control-label" for="radio6None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio6Little" name="optRadio6" value="Λίγο">
                    <label class="custom-control-label" for="radio6Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio6Enough" name="optRadio6" value="Αρκετά">
                    <label class="custom-control-label" for="radio6Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio6Very" name="optRadio6" value="Πολύ">
                    <label class="custom-control-label" for="radio6Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio6VeryMuch" name="optRadio6" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio6VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">7. Πόσο συχνά επικοινωνείτε με τον εργασιακό Επιβλέποντα του φορέα ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio7None" name="optRadio7" value="Καθόλου">
                    <label class="custom-control-label" for="radio7None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio7Little" name="optRadio7" value="Λίγο">
                    <label class="custom-control-label" for="radio7Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio7Enough" name="optRadio7" value="Αρκετά">
                    <label class="custom-control-label" for="radio7Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio7Very" name="optRadio7" value="Πολύ">
                    <label class="custom-control-label" for="radio7Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio7VeryMuch" name="optRadio7" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio7VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">8. Είστε επιμελής (και εσείς και ο Επιβλέπων)  στην τήρηση του Βιβλιάριου Πρακτικής Άσκησης ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio8None" name="optRadio8" value="Καθόλου">
                    <label class="custom-control-label" for="radio8None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio8Little" name="optRadio8" value="Λίγο">
                    <label class="custom-control-label" for="radio8Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio8Enough" name="optRadio8" value="Αρκετά">
                    <label class="custom-control-label" for="radio8Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio8Very" name="optRadio8" value="Πολύ">
                    <label class="custom-control-label" for="radio8Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio8VeryMuch" name="optRadio8" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio8VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">9. Είστε ικανοποιημένος από τη συνεργασία σας με τους υπόλοιπους συναδέλφους της επιχείρησης ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio9None" name="optRadio9" value="Καθόλου">
                    <label class="custom-control-label" for="radio9None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio9Little" name="optRadio9" value="Λίγο">
                    <label class="custom-control-label" for="radio9Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio9Enough" name="optRadio9" value="Αρκετά">
                    <label class="custom-control-label" for="radio9Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio9Very" name="optRadio9" value="Πολύ">
                    <label class="custom-control-label" for="radio9Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio9VeryMuch" name="optRadio9" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio9VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">10. Σε ποιο βαθμό, εκτός από το κύριο αντικείμενο εργασίας, εκτελούσατε περιστασιακά και άλλες άσχετες με το αντικείμενο δραστηριότητες ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio10None" name="optRadio10" value="Καθόλου">
                    <label class="custom-control-label" for="radio10None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio10Little" name="optRadio10" value="Λίγο">
                    <label class="custom-control-label" for="radio10Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio10Enough" name="optRadio10" value="Αρκετά">
                    <label class="custom-control-label" for="radio10Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio10Very" name="optRadio10" value="Πολύ">
                    <label class="custom-control-label" for="radio10Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio10VeryMuch" name="optRadio10" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio10VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">11. Είστε ικανοποιημένος από το μισθό σας ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio11None" name="optRadio11" value="Καθόλου">
                    <label class="custom-control-label" for="radio11None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio11Little" name="optRadio11" value="Λίγο">
                    <label class="custom-control-label" for="radio11Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio11Enough" name="optRadio11" value="Αρκετά">
                    <label class="custom-control-label" for="radio11Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio11Very" name="optRadio11" value="Πολύ">
                    <label class="custom-control-label" for="radio11Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio11VeryMuch" name="optRadio11" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio11VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">12. Κάνετε υπερωρίες κατά την Πρακτική σας Άσκηση ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio12Yes" name="optRadio12" value="Ναι">
                    <label class="custom-control-label" for="radio12Yes">Ναι</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio12No" name="optRadio12" value="Όχι">
                    <label class="custom-control-label" for="radio12No">Όχι</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">13. Σε περίπτωση που κάνετε υπερωρίες, υπάρχει επιπρόσθετη αμοιβή ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio13Yes" name="optRadio13" value="Ναι">
                    <label class="custom-control-label" for="radio13Yes">Ναι</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio13No" name="optRadio13" value="Όχι">
                    <label class="custom-control-label" for="radio13No">Όχι</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">14. Πόσες ώρες την εβδομάδα – εκτός ωραρίου – απ’ τον ελεύθερο χρόνο σας αφιερώσατε ώστε να ανταποκριθείτε στις απαιτήσεις της εργασίας σας :</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio1_14" name="optRadio14" value="0 ώρες">
                    <label class="custom-control-label" for="radio1_14">0 ώρες</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio2_14" name="optRadio14" value="1-2 ώρες">
                    <label class="custom-control-label" for="radio2_14">1-2 ώρες</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio3_14" name="optRadio14" value="3-6 ώρες">
                    <label class="custom-control-label" for="radio3_14">3-6 ώρες</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio4_14" name="optRadio14" value="7-10 ώρες">
                    <label class="custom-control-label" for="radio4_14">7-10 ώρες</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio5_14" name="optRadio14" value="πάνω από 10 ώρες">
                    <label class="custom-control-label" for="radio5_14">πάνω από 10 ώρες</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">15. Με ποια ιδιότητα απασχοληθήκατε :</label>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio1_15" name="optRadio15" value="Αναλυτής Εφαρμογών">
                    <label class="custom-control-label" for="radio1_15">Αναλυτής Εφαρμογών</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio2_15" name="optRadio15" value="Αναλυτής Συστημάτων">
                    <label class="custom-control-label" for="radio2_15">Αναλυτής Συστημάτων</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio3_15" name="optRadio15" value="Προγραμματιστής Εφαρμογών">
                    <label class="custom-control-label" for="radio3_15">Προγραμματιστής Εφαρμογών</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio4_15" name="optRadio15" value="Διαχειριστής Δικτύου">
                    <label class="custom-control-label" for="radio4_15">Διαχειριστής Δικτύου</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio5_15" name="optRadio15" value="Διαχειριστής Βάσεων Δεδομένων">
                    <label class="custom-control-label" for="radio5_15">Διαχειριστής Βάσεων Δεδομένων</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio6_15" name="optRadio15" value="Προγραμματιστής Συστημάτων">
                    <label class="custom-control-label" for="radio6_15">Προγραμματιστής Συστημάτων</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio7_15" name="optRadio15" value="Web developer">
                    <label class="custom-control-label" for="radio7_15">Web developer</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio8_15" name="optRadio15" value="Service Η/Υ">
                    <label class="custom-control-label" for="radio8_15">Service Η/Υ</label>
                </div>
                <div class="custom-control custom-radio ml-3">
                    <input class="custom-control-input" type="radio" id="radio9_15" name="optRadio15" value="Άλλο">
                    <label class="custom-control-label" for="radio9_15">Άλλο:</label><input type="text" class="ml-2" id="inputOther15" name="other15">
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">16. Πόσο καλή ήταν η συνεργασία σας με τον Ακαδημαϊκό Επόπτη ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio16None" name="optRadio16" value="Καθόλου">
                    <label class="custom-control-label" for="radio16None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio16Little" name="optRadio16" value="Λίγο">
                    <label class="custom-control-label" for="radio16Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio16Enough" name="optRadio16" value="Αρκετά">
                    <label class="custom-control-label" for="radio16Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio16Very" name="optRadio16" value="Πολύ">
                    <label class="custom-control-label" for="radio16Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio16VeryMuch" name="optRadio16" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio16VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">17. Θεωρείτε ότι οι θεωρητικές γνώσεις που λάβατε από το Τμήμα σας ήταν επαρκείς ώστε να αντεπεξέλθετε στις απαιτήσεις της εργασίας σας ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio17None" name="optRadio17" value="Καθόλου">
                    <label class="custom-control-label" for="radio17None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio17Little" name="optRadio17" value="Λίγο">
                    <label class="custom-control-label" for="radio17Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio17Enough" name="optRadio17" value="Αρκετά">
                    <label class="custom-control-label" for="radio17Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio17Very" name="optRadio17" value="Πολύ">
                    <label class="custom-control-label" for="radio17Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio17VeryMuch" name="optRadio17" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio17VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">18. Θεωρείτε ότι οι πρακτικές γνώσεις που λάβατε από το Τμήμα σας ήταν επαρκείς ώστε να αντεπεξέλθετε στις απαιτήσεις της εργασίας σας ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio18None" name="optRadio18" value="Καθόλου">
                    <label class="custom-control-label" for="radio18None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio18Little" name="optRadio18" value="Λίγο">
                    <label class="custom-control-label" for="radio18Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio18Enough" name="optRadio18" value="Αρκετά">
                    <label class="custom-control-label" for="radio18Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio18Very" name="optRadio18" value="Πολύ">
                    <label class="custom-control-label" for="radio18Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio18VeryMuch" name="optRadio18" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio18VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">19. Σε ποιο βαθμό απασχοληθήκατε με κάποιο αντικείμενο, το οποίο δεν είχατε διδαχθεί ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio19None" name="optRadio19" value="Καθόλου">
                    <label class="custom-control-label" for="radio19None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio19Little" name="optRadio19" value="Λίγο">
                    <label class="custom-control-label" for="radio19Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio19Enough" name="optRadio19" value="Αρκετά">
                    <label class="custom-control-label" for="radio19Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio19Very" name="optRadio19" value="Πολύ">
                    <label class="custom-control-label" for="radio19Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio19VeryMuch" name="optRadio19" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio19VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">20. Σε ποιο βαθμό σας βοήθησε το υπόβαθρο γνώσεων που αποκτήσατε στο Τμήμα, ώστε να ανταποκριθείτε στις απαιτήσεις του αντικειμένου που  δεν είχατε διδαχθεί;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio20None" name="optRadio20" value="Καθόλου">
                    <label class="custom-control-label" for="radio20None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio20Little" name="optRadio20" value="Λίγο">
                    <label class="custom-control-label" for="radio20Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio20Enough" name="optRadio20" value="Αρκετά">
                    <label class="custom-control-label" for="radio20Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio20Very" name="optRadio20" value="Πολύ">
                    <label class="custom-control-label" for="radio20Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio20VeryMuch" name="optRadio20" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio20VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">21. Επιλέξτε μέχρι 5 από τα παρακάτω θεματικά αντικείμενα που διδαχθήκατε και που αποδείχθηκαν πιο ωφέλιμα κατά την πρακτική σας άσκηση.</label>
                <div class="row">
                    <div class="col-md-4 offset-md-1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check1_21" name="answer_21[]" value="Γλώσσες/Μεθοδολογίες Προγραμματισμού">
                            <label class="custom-control-label" for="check1_21">Γλώσσες/Μεθοδολογίες Προγραμματισμού</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check3_21" name="answer_21[]" value="Λειτουργικά Συστήματα">
                            <label class="custom-control-label" for="check3_21">Λειτουργικά Συστήματα</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check2_21" name="answer_21[]" value="Αρχιτεκτονική Η/Υ">
                            <label class="custom-control-label" for="check2_21">Αρχιτεκτονική Η/Υ</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check4_21" name="answer_21[]" value="Δίκτυα">
                            <label class="custom-control-label" for="check4_21">Δίκτυα</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 offset-md-1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check5_21" name="answer_21[]" value="Οργάνωση Διοίκηση Επιχειρήσεων">
                            <label class="custom-control-label" for="check5_21">Οργάνωση Διοίκηση Επιχειρήσεων</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check6_21" name="answer_21[]" value="Βάσεις Δεδομένων">
                            <label class="custom-control-label" for="check6_21">Βάσεις Δεδομένων</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check7_21" name="answer_21[]" value="Πολυμέσα">
                            <label class="custom-control-label" for="check7_21">Πολυμέσα</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check8_21" name="answer_21[]" value="Διαδίκτυο">
                            <label class="custom-control-label" for="check8_21">Διαδίκτυο</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 offset-md-1">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check9_21" name="answer_21[]" value="Τεχνητή Νοημοσύνη/Ευφυή Συστήματα">
                            <label class="custom-control-label" for="check9_21">Τεχνητή Νοημοσύνη/Ευφυή Συστήματα</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check10_21" name="answer_21[]" value="Πληροφοριακά Συστήματα">
                            <label class="custom-control-label" for="check10_21">Πληροφοριακά Συστήματα</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check11_21" name="answer_21[]" value="Γραφικά">
                            <label class="custom-control-label" for="check11_21">Γραφικά</label>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check12_21" name="answer_21[]" value="Άλλο">
                            <label class="custom-control-label" for="check12_21">Άλλο</label>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">22. Επιλέξτε μέχρι 3 θεματικά αντικείμενα που δεν διδαχθήκατε και που από την εμπειρία που αποκτήσατε στην πρακτική σας άσκηση θεωρείτε πως είναι απαραίτητο να προστεθούν στο Πρόγραμμα Σπουδών του Τμήματος.</label>
                <div class="row mb-3">
                    <label class="col-form-label col-md-1 offset-md-1">1.</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="subject" name="subject1">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label col-md-1 offset-md-1">2.</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="subject" name="subject2">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-form-label col-md-1 offset-md-1">3.</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" id="subject" name="subject3">
                    </div>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">23. Σε ποιο βαθμό εμπλουτίστηκαν οι γνώσεις σας από την Πρακτική σας Άσκηση ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio23None" name="optRadio23" value="Καθόλου">
                    <label class="custom-control-label" for="radio23None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio23Little" name="optRadio23" value="Λίγο">
                    <label class="custom-control-label" for="radio23Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio23Enough" name="optRadio23" value="Αρκετά">
                    <label class="custom-control-label" for="radio23Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio23Very" name="optRadio23" value="Πολύ">
                    <label class="custom-control-label" for="radio23Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio23VeryMuch" name="optRadio23" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio23VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">24. Σε ποιο βαθμό πιστεύετε ότι θα σας βοηθήσει η εμπειρία που αποκτήσατε στην επαγγελματική σας εξέλιξη ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio24None" name="optRadio24" value="Καθόλου">
                    <label class="custom-control-label" for="radio24None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio24Little" name="optRadio24" value="Λίγο">
                    <label class="custom-control-label" for="radio24Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio24Enough" name="optRadio24" value="Αρκετά">
                    <label class="custom-control-label" for="radio24Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio24Very" name="optRadio24" value="Πολύ">
                    <label class="custom-control-label" for="radio24Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio24VeryMuch" name="optRadio24" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio24VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-form-label col-md-12">25. Προσληφθήκατε στο φορέα, στον οποίο κάνατε την πρακτική σας άσκηση ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio25Yes" name="optRadio25" value="Ναι">
                    <label class="custom-control-label" for="radio25Yes">Ναι</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio25No" name="optRadio25" value="Όχι">
                    <label class="custom-control-label" for="radio25No">Όχι</label>
                </div>
            </div>
        
            <div class="form-group mb-5">
                <label class="col-form-label col-md-12">26. Εκδηλώθηκε ενδιαφέρον απ’ το φορέα  για πρόσληψη μετά το πέρας της πρακτικής άσκησης ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio26None" name="optRadio26" value="Καθόλου">
                    <label class="custom-control-label" for="radio26None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio26Little" name="optRadio26" value="Λίγο">
                    <label class="custom-control-label" for="radio26Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio26Enough" name="optRadio26" value="Αρκετά">
                    <label class="custom-control-label" for="radio26Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio26Very" name="optRadio26" value="Πολύ">
                    <label class="custom-control-label" for="radio26Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio26VeryMuch" name="optRadio26" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio26VeryMuch">Πάρα πολύ</label>
                </div>
            </div>
        
            <div class="form-group">
                <div class="text-center">
                    <button id="submitBtn" type="submit" name="submit_btn" class="btn btn-success">Υποβολή  <i class="far fa-paper-plane"></i></button>
                </div>
            </div>
            
            <h5 class="text-center">Σας ευχαριστούμε για τον χρόνο που διαθέσατε!</h5>
        </form>

    </div>
</div>
@endsection
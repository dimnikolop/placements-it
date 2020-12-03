@extends('layouts.app')

@section('content')
<div class="container">
    <div id="questionnaireForm">
        <h5 class="text-center mb-5">ΕΡΩΤΗΜΑΤΟΛΟΓΙΟ ΑΞΙΟΛΟΓΗΣΗΣ ΤΗΣ ΠΡΑΚΤΙΚΗΣ ΑΣΚΗΣΗΣ ΦΟΙΤΗΤΗ<br/>ΑΠΟ ΤΟΝ ΑΚΑΔΗΜΑΙΚΟ ΕΠΟΠΤΗ ΤΟΥ ΤΜΗΜΑΤΟΣ</h5>
   
        <form id="companyQuestionnaireForm" action="" method="post">
            <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right" for="studentName">Όνομα Ασκούμενου Φοιτητή :<span class="required">*</span></label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="studentName" name="student"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right" for="registerNumber">AM :<span class="required">*</span></label>
                <div class="col-sm-2">
                    <input class="form-control" type="text" id="registerNumber" name="AM"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right" for="companyName">Φορέας Απασχόλησης :<span class="required">*</span></label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="companyName" name="company"/>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-3 col-form-label text-right" for="supervisorName">Όνομα Ακαδημαϊκού Επόπτη :<span class="required">*</span></label>
                <div class="col-sm-8">
                    <input class="form-control" type="text" id="supervisorName" name="supervisor"/>
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

            <div class="well"><em>
                Σας παρακαλούμε θερμά να συμπληρώσετε το παρόν ερωτηματολόγιο με τη δέουσα προσοχή και ειλικρίνεια. 
                Οι απαντήσεις σας θα ληφθούν σοβαρά υπόψη και θα συμβάλουν στην ουσιαστική βελτίωση της ποιότητας του θεσμού της πρακτικής άσκησης, 
                προς το κοινό όφελος όλων των φορέων που συμμετέχουν. Σας διαβεβαιώνουμε ότι τα προσωπικά σας δεδομένα και οι απαντήσεις σας είναι 
                εμπιστευτικές και δεν πρόκειται να διαβιβαστούν σε τρίτους.
            </em></div>

            <div class="form-group">
                <label class="col-form-label col-md-12">1. Πόσο σχετικός με το γνωστικό αντικείμενο του Τμήματος ήταν ο φορέας (επιχείρηση/οργανισμός/υπηρεσία) στον οποίο τοποθετήθηκε ο ασκούμενος ;</label>
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
                <label class="col-form-label col-md-12">2. Πόσο σχετική με το γνωστικό αντικείμενο του Τμήματος ήταν η θέση απασχόλησης στην οποία τοποθετήθηκε ο ασκούμενος ;</label>
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
                <label class="col-form-label col-md-12">3. Ήταν το αντικείμενο εργασίας του/της ασκούμενου/ης σαφές και καθορισμένο ;</label>
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
                <label class="col-form-label col-md-12">4. Πόσο ικανοποιητική ήταν η εκπαίδευση του/της ασκούμενου/ης από τον εργασιακό Επιβλέποντα ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio4None" name="optRadio4" value="Καθόλου">
                    <label class="custom-control-label" for="radio4None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio4Little" name="optRadio4" value="Λίγο">
                    <label class="custom-control-label" for="radio4Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio4Enough" name="optRadio4" value="Αρκετά">
                    <label class="custom-control-label" for="radio4Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio4Very" name="optRadio4" value="Πολύ">
                    <label class="custom-control-label" for="radio4Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio4VeryMuch" name="optRadio4" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio4VeryMuch">Πάρα πολύ</label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-form-label col-md-12">5. Πόσο ικανοποιητική κρίνετε την καθοδήγηση του/της ασκούμενου/ης από τον εργασιακό Επιβλέποντα ;</label>
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
                <label class="col-form-label col-md-12">7. Πόσο ικανοποιημένο κρίνατε τον εργασιακό Επιβλέποντα από την απόδοση του/της ασκούμενου/ης ;</label>
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
                <label class="col-form-label col-md-12">8. Πόσο ικανοποιητική κρίνατε τη συνεργασία του/της ασκούμενου/ης με τους υπόλοιπους εργαζομένους του φορέα ;</label>
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
                <label class="col-form-label col-md-12">9. Πόσο ικανοποιητικό κρίνατε τον εξοπλισμό του χώρου στον οποίο εργάζεται ο/η ασκούμενος/η ;</label>
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
                <label class="col-form-label col-md-12">10. Πόσο καλές κρίνατε τις συνθήκες εργασίας του/της ασκούμενου/ης ;</label>
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
                <label class="col-form-label col-md-12">11. Σε ποιο βαθμό πιστεύετε ότι θα βοηθήσει τον/την ασκούμενο/η η εμπειρία που απέκτησε στην επαγγελματική του/της εξέλιξη ;</label>
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

            <div class="form-group mb-5">
                <label class="col-form-label col-md-12">12. Θα προτείνατε την τοποθέτηση και άλλων ασκούμενων στην επιχείρηση/υπηρεσία/οργανισμό ;</label>
                <div class="custom-control custom-radio custom-control-inline ml-3">
                    <input class="custom-control-input" type="radio" id="radio12None" name="optRadio12" value="Καθόλου">
                    <label class="custom-control-label" for="radio12None">Καθόλου</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio12Little" name="optRadio12" value="Λίγο">
                    <label class="custom-control-label" for="radio12Little">Λίγο</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio12Enough" name="optRadio12" value="Αρκετά">
                    <label class="custom-control-label" for="radio12Enough">Αρκετά</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio12Very" name="optRadio12" value="Πολύ">
                    <label class="custom-control-label" for="radio12Very">Πολύ</label>
                </div>
                <div class="custom-control custom-radio custom-control-inline">
                    <input class="custom-control-input" type="radio" id="radio12VeryMuch" name="optRadio12" value="Πάρα πολύ">
                    <label class="custom-control-label" for="radio12VeryMuch">Πάρα πολύ</label>
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
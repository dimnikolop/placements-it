@extends('layouts.app')

@section('content')
<div class="container">
    <div id="mainCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#mainCarousel" data-slide-to="1"></li>
            <li data-target="#mainCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/slides/1.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/slides/2.jpg')}}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/slides/3.jpg')}}" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#mainCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#mainCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="row mt-5">
		<div class="col-lg-6">
			<div class="text-justify">
				<p>Η Πρακτική Άσκηση αποτελεί σημείο αναφοράς  στις σπουδές του φοιτητή.
					Η επιλογή για το χώρο εργασίας του φοιτητή πρέπει να γίνεται με σύνεση και 
					είναι ουσιαστικής σημασίας να σχετίζεται με το αντικείμενο των σπουδών του.
                </p>
                <p>Η ένταξη Πρακτικής Ασκησης στο Πρόγραμμα Σπουδών, δείχνει και την βαρύτητα που
                    έχει ο θεσμός στην άρτια Τεχνολογική Εκπαίδευση των φοιτητών του Τμήματος μας.
                </p>
                <p>Σκοπός της Πρακτικής Ασκησης είναι η εξοικείωση και η εξάσκηση των φοιτητών στο
                    αντικείμενο του Τμήματος και σε πρακτικό επίπεδο.
                </p>
                <p>Η Πρακτική Ασκηση είναι υποχρεωτική, έχει εξάμηνη διάρκεια (ημερολογιακό  εξάμηνο),
                    διεξάγεται το τελευταίο εξάμηνο των σπουδών και είναι απαραίτητη προϋπόθεση για την λήψη του πτυχίου. 
                </p>
                <p>Το τμήμα Μηχανικών Πληροφορικής σχεδίασε αυτό το δικτυακό χώρο με βασικό στόχο να παρέχει 
					πλήρη υποστήριξη στην επιλογή του φοιτητή αλλά και σημαντική βοήθεια σε διαδικαστικά θέματα.
                </p>	
			</div>					
		</div>
		<div class="col-lg-6">
			<div class="text-justify">
				<p>Κύριος σκοπός της Πρακτικής Ασκησης είναι η εξάσκηση τους στα πλαίσια του γνωστικού αντικειμένου του Τμήματος 
					σε φορέα (Ιδιωτικό ή Δημόσιο) και σε θέση απασχόλησης σχετική με το γνωστικό αντικείμενο του Τμήματος.
                </p>
                <p class="lead"><u>Στους σκοπούς της πρακτικής άσκησης είναι επίσης:</u></p>
                <ol>
                    <li>Η ενημέρωση των ασκούμενων για τη διάρθρωση και λειτουργία των μονάδων παραγωγής ή υπηρεσιών στις οποίες θα εργαστούν μελλοντικά ως επαγγελματίες.</li>
                    <li>Η ενεργός συμμετοχή των ασκούμενων στις διαδικασίες και μεθόδους παραγωγής ή παροχής υπηρεσιών.</li>
	                <li>Η συσχέτιση των θεωρητικών και Εργαστηριακών γνώσεων οι οποίες αποκτήθηκαν κατά την διάρκεια των σπουδών με το Πραγματικό περιβάλλον εργασίας.</li>
                    <li>Η κατανόηση των οικονομικών και τεχνολογικών παραγόντων οι οποίοι επηρεάζουν τις συνθήκες εργασίας.</li>
                    <li>Η επαφή του Τμήματος με τους χώρους παραγωγής και εφαρμοσμένης έρευνας και η δημιουργία αμφίδρομης σχέσης.</li>
                </ol>
			</div>
		</div>
	</div>

    <div class="section">
        <div class="row">
            <div class="col-lg-3 my-3">
                <div class="box text-center">
					<div class="box-gray">
						<h5>Έντυπα</h5>
						<div class="icon">
							<img src="{{ asset('img/entypa.png') }}" class="img-fluid" alt="">
						</div>
						<p>Έντυπα σε ηλεκτρονική μορφή που αφορούν τη Πρακτική Άσκηση με ΕΣΠΑ,ΟΑΕΔ ή στο ΑΤΕΙ.</p>
					</div>
					<div class="box-bottom">
						<a href="?p=praktiki_files">Δείτε Περισσότερα</a>
					</div>
				</div>
            </div>
            <div class="col-lg-3 my-3">
                <div class="box text-center">
					<div class="box-gray">
						<h5>Νομοθεσία</h5>
						<div class="icon">
							<img src="{{ asset('img/nomothesia.jpg') }}" class="img-fluid" alt="">
						</div>
						<p>Νόμοι, Υπουργικές αποφάσεις και διατάγματα που αφορούν την Πρακτική Άσκηση.</p>
					</div>
					<div class="box-bottom">
						<a href="?p=praktiki_files">Δείτε Περισσότερα</a>
					</div>
				</div>
            </div>
            <div class="col-lg-3 my-3">
                <div class="box text-center">
					<div class="box-gray">
						<h5>Αξιολόγηση</h5>
						<div class="icon">
							<img src="{{ asset('img/axer.png') }}" class="img-fluid" alt="">
						</div>
						<p>Ερωτηματολόγια για επιβέποντες φορέων, φοιτητές και επόπτες καθηγητές για την αξιολόγηση Πρακτικής Άσκησης.</p>
					</div>
					<div class="box-bottom">
						<a href="{{ route('questionnaires.index') }}">Δείτε Περισσότερα</a>
					</div>
				</div>
            </div>
            <div class="col-lg-3 my-3">
                <div class="box text-center">
					<div class="box-gray">
						<h5>Χάρτης Αποφοίτων</h5>
						<div class="icon">
							<img src="{{ asset('img/world-globe.png') }}" class="img-fluid" alt="">
						</div>
						<p>Πού βρίσκονται και που εργάζονται οι απόφοιτοι του Τμήματος;</p>
					</div>
					<div class="box-bottom">
						<a href="?p=praktiki_files">Δείτε Περισσότερα</a>
					</div>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
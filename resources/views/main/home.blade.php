@extends('layouts.app')

@section('banner')
<div id="mainCarousel" class="carousel slide carousel-fade" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
        <li data-target="#mainCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#mainCarousel" data-slide-to="1"></li>
        <li data-target="#mainCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active" style="background-image: url( {{ asset('img/slides/main-banner-img1.jpg') }} )">
            <div class="carousel-item-overlay"></div>
            <div class="container">
                <h1 class="font-weight-light mb-md-4">Καλώς Ήλθατε</h1>
                <h4>Πρακτική Άσκηση του τμήματος Μηχανικών Πληροφορικής</h4>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url( {{ asset('img/slides/main-banner-img2.jpg') }} )">
            <div class="carousel-item-overlay"></div>
            <div class="container">
                <h1 class="font-weight-light mb-md-4">Καλώς Ήλθατε</h1>
                <h4>Πρακτική Άσκηση του τμήματος Μηχανικών Πληροφορικής</h4>
            </div>
        </div>
        <div class="carousel-item" style="background-image: url( {{ asset('img/slides/main-banner-img3.jpg') }} )">
            <div class="carousel-item-overlay"></div>
            <div class="container">
                <h1 class="font-weight-light mb-md-4">Καλώς Ήλθατε</h1>
                <h4>Πρακτική Άσκηση του τμήματος Μηχανικών Πληροφορικής</h4>
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 mb-2"><h3>Λίγα λόγια...</h3></div>
		<div class="col-md-6">
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
		<div class="col-md-6">
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

    <div id="box-section" class="section">
        <div class="row">
            <div class="col-md-6 col-lg-3 my-3">
                <div class="card h-100">
					<div class="card-body">
						<h5 class="card-title">Έντυπα</h5>
						<img src="{{ asset('img/entypa.png') }}" class="img-fluid" alt="">
						<p class="card-text">Έντυπα σε ηλεκτρονική μορφή που αφορούν τη Πρακτική Άσκηση με ΕΣΠΑ,ΟΑΕΔ ή στο ΑΤΕΙ.</p>
					</div>
					<a href="?p=praktiki_files" class="btn btn-info">Δείτε Περισσότερα</a>
				</div>
            </div>
            <div class="col-md-6 col-lg-3 my-3">
                <div class="card h-100">
					<div class="card-body">
						<h5 class="card-title">Νομοθεσία</h5>
						<img src="{{ asset('img/nomothesia.jpg') }}" class="img-fluid" alt="">
						<p class="card-text">Νόμοι, Υπουργικές αποφάσεις και διατάγματα που αφορούν την Πρακτική Άσκηση.</p>
					</div>
					<a href="?p=praktiki_files" class="btn btn-info">Δείτε Περισσότερα</a>
				</div>
            </div>
            <div class="col-md-6 col-lg-3 my-3">
                <div class="card">
					<div class="card-body">
						<h5 class="card-title">Αξιολόγηση</h5>
						<img src="{{ asset('img/axer.png') }}" class="img-fluid" alt="">
						<p class="card-text">Ερωτηματολόγια για επιβέποντες φορέων, φοιτητές και επόπτες καθηγητές για την αξιολόγηση Πρακτικής Άσκησης.</p>
					</div>
					<a href="{{ route('questionnaires.index') }}" class="btn btn-info">Δείτε Περισσότερα</a>
				</div>
            </div>
            <div class="col-md-6 col-lg-3 my-3">
                <div class="card h-100">
					<div class="card-body">
						<h5 class="card-title">Χάρτης Αποφοίτων</h5>
						<img src="{{ asset('img/world-globe.png') }}" class="img-fluid" alt="">
						<p class="card-text">Πού βρίσκονται και που εργάζονται οι απόφοιτοι του Τμήματος;</p>
					</div>
					<a href="{{ route('graduates.map') }}" class="btn btn-info">Δείτε Περισσότερα</a>
				</div>
            </div>
        </div>
    </div>
</div>
@endsection
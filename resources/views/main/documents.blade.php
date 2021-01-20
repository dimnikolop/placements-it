@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3">
        <div class="col mb-4">
            <div class="card custom-main-card h-100">
                <h5 class="card-header">ΕΣΠΑ</h5>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <div class="list-group">
                        <a href="{{ asset('storage/documents/espa/Βεβαίωση Εργοδότη για απασχόληση φοιτητή_EΕ_2015.doc') }}" class="list-group-item list-group-item-action">Βεβαίωση Εργοδότη για απασχόληση φοιτητή EΕ 2015</a>
                        <a href="{{ asset('storage/documents/espa/Βεβαίωση_Απασχόλησης_2016.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Βεβαίωση Απασχόλησης 2016</a>
                        <a href="{{ asset('storage/documents/espa/Δήλωση Ατομικών Στοιχείων Φοιτητών ΕΣΠΑ_EΕ_2015.doc') }}" class="list-group-item list-group-item-action">Δήλωση Ατομικών Στοιχείων Φοιτητών ΕΣΠΑ EΕ 2015</a>
                        <a href="{{ asset('storage/documents/espa/Ειδική_Αίτηση_Έγκρισης_Πρακτικής_Άσκησης_2014.doc') }}" class="list-group-item list-group-item-action">Ειδική Αίτηση Έγκρισης Πρακτικής Άσκησης 2014</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card custom-main-card h-100">
                <h5 class="card-header">ΟΑΕΔ</h5>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <div class="list-group">
                        <a href="{{ asset('storage/documents/oaed/Βεβαίωση_Απασχόλησης_2016.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Βεβαίωση Απασχόλησης 2016</a>
                        <a href="{{ asset('storage/documents/oaed/Ειδική_Αίτηση_Έγκρισης_Πρακτικής_Άσκησης_2014.doc') }}" class="list-group-item list-group-item-action">Ειδική Αίτηση Έγκρισης Πρακτικής Άσκησης 2014</a>
                        <a href="{{ asset('storage/documents/oaed/Σύμβαση_Εργασίας_Πρακτικής_Άσκησης_2014.doc') }}" class="list-group-item list-group-item-action">Σύμβαση Εργασίας Πρακτικής Άσκησης 2014</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col mb-4">
            <div class="card custom-main-card h-100">
                <h5 class="card-header">ΑΤΕΙΘ</h5>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>
                    <div class="list-group">
                        <a href="{{ asset('storage/documents/ateith/Δήλωση Ατομικών Στοιχείων Φοιτητών ΕΣΠΑ_ΕΕ_2014.doc') }}" class="list-group-item list-group-item-action">Δήλωση Ατομικών Στοιχείων Φοιτητών ΕΣΠΑ ΕΕ 2014</a>
                        <a href="{{ asset('storage/documents/ateith/Ειδική_Αίτηση_Έγκρισης_Πρακτικής_Ασκησης_2014.doc') }}" class="list-group-item list-group-item-action">Ειδική Αίτηση Έγκρισης Πρακτικής Ασκησης 2014</a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>
@endsection
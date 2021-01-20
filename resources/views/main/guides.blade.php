@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-deck">
        <div class="card custom-main-card">
            <h5 class="card-header">Οδηγοί Πρακτικής Άσκησης</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <div class="list-group">
                    <a href="{{ asset('storage/documents/guides/Οδηγός πρακτικής άσκησης φοιτητών ΑΤΕΙΘ- ΕΣΠΑ 2η έκδοση.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Οδηγός πρακτικής άσκησης φοιτητών ΑΤΕΙΘ - ΕΣΠΑ 2η έκδοση</a>
                    <a href="{{ asset('storage/documents/guides/Οδηγός πρακτικής άσκησης.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Οδηγός πρακτικής άσκησης ΑΤΕΙ</a>
                </div>
            </div>
        </div>
        <div class="card custom-main-card">
            <h5 class="card-header">Οδηγίες - Πληροφορίες για το σύστημα Πρακτικής Άσκησης ΑΤΛΑΣ</h5>
            <div class="card-body">
                <h5 class="card-title"></h5>
                <h6 class="card-subtitle mb-2 text-muted"></h6>
                <div class="list-group">
                    <a href="{{ asset('storage/documents/guides/PORTAL_Manual FYPA App.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Οδηγός Χρήσης Εφαρμογής Φορέων Υποδοχής Πρακτικής Άσκησης</a>
                    <a href="{{ asset('storage/documents/guides/Students_Manual.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Εγχειρίδιο Εφαρμογής Φοιτητών</a>
                    <a href="{{ asset('storage/documents/guides/Οδηγός Εγγραφής Φορέων Υποδ. ΠΑ.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Οδηγός Εγγραφής Φορέων Υποδοχής Πρακτικής Άσκησης</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
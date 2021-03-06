@extends('layouts.app')

@section('title', 'Ερωτηματολόγια Αξιολόγησης')

@section('content')
<div class="container">
    <div class="card-deck">
        <div class="card custom-main-card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Ασκούμενου Φοιτητή - Πατήστε&nbsp;  <a href="{{ route('questionnaires.trainee.create') }}">ΕΔΩ</a>
            </div>
        </div>
        <div class="card custom-main-card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Εργοδότη - Πατήστε&nbsp;  <a href="{{ route('questionnaires.company.create') }}">ΕΔΩ</a>
            </div>
        </div>
        <div class="card custom-main-card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Ακαδημαϊκού Επόπτη - Πατήστε&nbsp;  <a href="{{ route('questionnaires.professor.create') }}">ΕΔΩ</a>
            </div>
        </div>
    </div>
</div>
@endsection
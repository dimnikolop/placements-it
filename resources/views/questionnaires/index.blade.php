@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Φοιτητή - Πατήστε&nbsp;  <a href="{{ route('questionnaires.student.create') }}">ΕΔΩ</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Εργοδότη - Πατήστε&nbsp;  <a href="{{ route('questionnaires.company.create') }}">ΕΔΩ</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Ακαδημαϊκού Επόπτη - Πατήστε&nbsp;  <a href="{{ route('questionnaires.professor.create') }}">ΕΔΩ</a>
            </div>
        </div>
    </div>
</div>
@endsection
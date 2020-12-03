@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card-deck">
        <div class="card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Φοιτητή - Πατήστε&nbsp;  <a href="{{ route('student_questionnaire') }}">ΕΔΩ</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Εργοδότη - Πατήστε&nbsp;  <a href="{{ route('company_questionnaire') }}">ΕΔΩ</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                Για να υποβάλετε το Ερωτηματολόγιο του Ακαδημαϊκού Επόπτη - Πατήστε&nbsp;  <a href="{{ route('professor_questionnaire') }}">ΕΔΩ</a>
            </div>
        </div>
    </div>
</div>
@endsection
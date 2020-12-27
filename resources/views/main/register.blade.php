@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card text-center" style="width: 28rem;">
        <div class="card-body">
            <h5 class="card-title my-3">Εγγραφή</h5>
            <div class="icon mb-3">
                <img src="{{ asset('img/register_icon.png') }}" class="img-fluid" alt="...">
            </div>
            <p class="card-text" style="color:#003cb3;">Για να εγγραφείτε στό σύστημα, επιλέξτε την κατηγορία χρήστη που ανήκετε :</p>
            <a href="{{ route('companies.create') }}" class="card-link btn btn-light">Φορέας Απασχόλησης</a>
            <a href="{{ route('graduates.create') }}" class="card-link btn btn-light">Απόφοιτος Τμήματος</a>
            <hr>
            <p>Σημείωση: Οι <u><b>Προπτυχιακοί Φοιτητές</b></u> δεν χρειάζεται να συνδεθούν στο σύστημα για την έναρξη της Πρακτικής τους Άσκησης</p>
        </div>
    </div>
</div>
@endsection
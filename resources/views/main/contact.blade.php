@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-lg-2">
        <div class="col mb-4 mb-lg-0">
            <div class="card custom-main-card">
                <div class="card-header font-weight-bold">Γραφείο Πρακτικής Άσκησης</div>
                <div class="card-body">
                    <address>
                        <span class="font-weight-bold d-block">Διεύθυνση:</span> 
                        <ul class="list-unstyled">
                            <li class="ml-3">Αλεξάνδρειο ΤΕΙ Θεσσαλονίκης</li>
                            <li class="ml-3">Σχολή Τεχνολογικών Εφαρμογών</li>
                            <li class="ml-3">Τμήμα Μηχανικών Πληροφορικής Τ.Ε - 1ος όροφος</li>
                            <li class="ml-3">Τ.Θ. 141, Σίνδος</li>
                            <li class="ml-3">Τ.Κ. 57400 - Θεσσαλονίκης</li>
                        </ul>
                    </address> 
                    <p><span class="font-weight-bold">Τηλέφωνο:</span> 2310 - 013 414</p>
                    <p><span class="font-weight-bold">E-mail:</span> <a class="text-info" href="mailto:placemnt@it.teithe.gr" target="_top">placemnt@it.teithe.gr</a></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card custom-main-card h-100">
                <div class="card-header font-weight-bold">Ιδρυματικά Υπεύθυνος</div>
                <div class="card-body">
                    <p><span class="d-block font-weight-bold">Γουλιάνας Κωνσταντίνος</span> (Επίκουρος Καθηγητής Τμήματος Πληροφορικής)</p> 
                    <p><span class="font-weight-bold">Τηλέφωνο:</span>  2310 - 791287</p>
                    <p><span class="font-weight-bold">Fax:</span>  2310 - 798356 & 791294</p>
                    <p><span class="font-weight-bold">E-mail:</span> <a class="text-info" href="mailto:gouliana@it.teithe.gr" target="_top">gouliana@it.teithe.gr</a></p>
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                aria-controls="profile" aria-selected="true">Στοιχεία Εταιρείας :</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="jobs-tab" data-toggle="tab" href="#jobs" role="tab" aria-controls="jobs"
                aria-selected="false">Θέσεις Απασχόλησης :</a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
                aria-selected="false">Contact</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active p-4 border border-secondary" id="profile" role="tabpanel"
            aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-md-2">
                    <h6>Επωνυμία:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->name }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Περιγραφή:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->description }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Κατηγορία:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->sector }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Διεύθυνση:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->address }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Τοποθεσία:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->location }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Ιστότοπος:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->website }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Υπεύθυνος Επικοινωνίας:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->contact_person }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Τηλέφωνο:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->phone }}</p>
                </div>

                <div class="col-md-2">
                    <h6>E-mail:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->email }}</p>
                </div>

                <div class="col-md-2">
                    <h6>Σημειώσεις:</h6>
                </div>
                <div class="col-md-10">
                    <p>{{ $company->notes }}</p>
                </div>
            </div>
            <div class="row justify-content-end">
                <a class="btn btn-secondary btn-sm" href="#">
                    <i class="far fa-edit"></i> Επεξεργασία
                </a>
                <a class="btn btn-danger btn-sm ml-3" href="#" data-toggle="modal" data-target="#deleteModal" data-id="">
                    <i class="far fa-trash-alt"></i> Διαγραφή
                </a>
            </div>
        </div>
        <div class="tab-pane fade" id="jobs" role="tabpanel" aria-labelledby="jobs-tab">...</div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
    </div>
</div>
@endsection
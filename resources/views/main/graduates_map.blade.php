@extends('layouts.app')

@section('title', 'Χάρτης Αποφοίτων')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="mb-3">Απόφοιτοι</h3>
            <div class="text-justify">
                <p>Το Τμήμα επιθυμεί και κρίνει απαραίτητο να έρθει σε επαφή με όλους τους αποφοίτους του για να βρίσκεται σε ανοιχτή 
                επικοινωνία μαζί τους. Αυτό θα εξυπηρετήσει πολλούς στόχους. Το Τμήμα θα γνωρίζει την πορεία των αποφοίτων που θεωρεί 
                «δικά του παιδιά», την είσοδό τους στην αγορά εργασίας, την επαγγελματική τους αποκατάσταση στο δημόσιο ή ιδιωτικό τομέα 
                σε εργασίες σχετικές ή όχι με την πληροφορική, τις δυσκολίες που αντιμετώπισαν μετά την αποφοίτηση ή αντιμετωπίζουν ακόμα 
                και σήμερα, την ανάγκη για επικαιροποίηση των σπουδών τους ή τη συνέχισή τους σε μεταπτυχιακό επίπεδο, και πολλά άλλα θέματα 
                σχετικά με την επαγγελματική τους εξέλιξη καθώς και την αποτελεσματικότητα των μαθημάτων και σεμιναρίων της Σχολής.</p>
                
                <p>Όπου και αν βρίσκεστε γεωγραφικά και σε οποιαδήποτε στάδιο της καριέρας σας, συμπληρώστε την παρακάτω φόρμα αποφοίτων για να
                μάθουμε και εμείς τα νέα σας και τις δραστηριότητές σας στην επαγγελματική σας καριέρα.</p>
            </div>
            <div class="text-center my-5">
                <a href="{{ route('graduates.create') }}" class="btn btn-outline-primary">Εγγραφή Απόφοιτων</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <h5>Χάρτης Αποφοίτων</h5>
            <div id="map" style="height:500px;"></div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Graduates info turn to json
    var graduates = @json($graduates);
    
    let map;

    // Initialize and add the map
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
            center: { lat: 41.902783, lng: 12.496366 },
            zoom: 5,
        });

        const image = '/img/graduation-cap.png';

        $.each(graduates, function (index, graduate) {

            const point = new google.maps.LatLng(graduate.lat, graduate.lng);
            
            // Adds a marker to the map.
            const marker = new google.maps.Marker({
                position: point,
                map: map,
                icon: image,
                title: graduate.surname + " " + graduate.name
            });

            let contentString =
                '<div id="content">' +
                    '<h6 class="mb-3">' + graduate.surname + ' ' + graduate.name + '</h6>' +
                    '<div id="bodyContent">' +
                        '<p class="mb-1">Αποφοίτησε: ' + graduate.graduation_year + '</p>' +
                        '<p class="mb-1">Θέση εργασίας: <span>' + graduate.job + '</span></p>' +
                        '<p class="border-bottom mb-2">Εργοδότης: <span>' + graduate.employer + '</span></p>';
                if (graduate.website) {
                    contentString += '<p class="mb-0">Site: <a href="' + graduate.website + '" target="_blank">' + graduate.website + '</a></p>';
                }

            contentString += "</div>";

            const infowindow = new google.maps.InfoWindow({
                content: contentString,
            });

            marker.addListener("click", () => {
                infowindow.open(map, marker);
            });

        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=putKeyHere&callback=initMap&libraries=&v=weekly"></script>
@endpush
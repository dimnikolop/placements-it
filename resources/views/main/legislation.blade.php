@extends('layouts.app')

@section('content')
<div id="legislation" class="container">
    <div class="card custom-main-card">
        <h5 class="card-header">ΝΟΜΟΘΕΣΙΑ</h5>
        <div class="card-body">
            <h5 class="card-title"></h5>
            <h6 class="card-subtitle mb-2 text-muted"></h6>
            <div class="list-group">
                <a href="{{ asset('storage/documents/legislation/Nomos 1404.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Nomos 1404</a>
                <a href="{{ asset('storage/documents/legislation/Ν1351_ΦΕΚ_56_28_4_1983.pdf') }}" class="list-group-item list-group-item-action" target="_blank">Ν1351_ΦΕΚ_56_28_4_1983</a>
                <a href="{{ asset('storage/documents/legislation/ΥΑ_2025805_2917_0022_ΦΕΚ_357_22_4_1993.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΥΑ_2025805_2917_0022_ΦΕΚ_357_22_4_1993</a>
                <a href="{{ asset('storage/documents/legislation/ΥΑ_Ε5_1258_ΦΕΚ_133_27_3_1986.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΥΑ_Ε5_1258_ΦΕΚ_133_27_3_1986</a>
                <a href="{{ asset('storage/documents/legislation/ΥΑ_Ε5_1797_ΦΕΚ_183_20_3_1986.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΥΑ_Ε5_1797_ΦΕΚ_183_20_3_1986</a>
                <a href="{{ asset('storage/documents/legislation/ΥΑ_Ε5_4825_ΦΕΚ_453_16_6_1986.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΥΑ_Ε5_4825_ΦΕΚ_453_16_6_1986</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 56 Ν 1331 761-768.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 56 Ν 1331 761-768</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 56_28_04_1983_Ν 1351 Υποχρέωση Δημοσίου να Απασχολεί Φοιτητές για Πρακτική Ασκηση.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 56_28_04_1983_Ν 1351 Υποχρέωση Δημοσίου να Απασχολεί Φοιτητές για Πρακτική Ασκηση</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 59 ΠΔ 174 20_03_1985 Θεσμός της Πρακτικής Ασκησης.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 59 ΠΔ 174 20_03_1985 Θεσμός της Πρακτικής Ασκησης</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 61 ΠΔ 185 Ιατροφαρμακευτική Περίθαλψη ΤΕΙ.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 61 ΠΔ 185 Ιατροφαρμακευτική Περίθαλψη ΤΕΙ</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 133 ΥΑ Ε5 1258.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 133 ΥΑ Ε5 1258</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 133_25_02_1986_Ε5_1258 Αποζημίωση Ασκούμενων στο Δημόσιο Τομέα.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 133_25_02_1986_Ε5_1258 Αποζημίωση Ασκούμενων στο Δημόσιο Τομέα</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 167 Ν 1566.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 167 Ν 1566</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 173.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 173</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 183 ΥΑ Ε5 1797.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 183 ΥΑ Ε5 1797</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 183_20_03_1986_Ε5_1797 Αποζημίωση Ασκουμένων στον Ιδιωτικό Τομέα.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 183_20_03_1986_Ε5_1797 Αποζημίωση Ασκουμένων στον Ιδιωτικό Τομέα</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 307 ΥΑ 2917.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 307 ΥΑ 2917</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 307_2025806_2917_0022_22_4_1993 Αύξηση Μηνιαίας Αποζημίωσης Ασκούμενων στο Δημόσιο Τομέα.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 307_2025806_2917_0022_22_4_1993 Αύξηση Μηνιαίας Αποζημίωσης Ασκούμενων στο Δημόσιο Τομέα</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 332 Λάθος Σελίδα.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 332 Λάθος Σελίδα</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 379 30_6_1983_Φ. 3257_Ε1_2244 Ασφάλιση στο ΙΚΑ.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 379 30_6_1983_Φ. 3257_Ε1_2244 Ασφάλιση στο ΙΚΑ</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 453 ΥΑ Ε5 4825.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 453 ΥΑ Ε5 4825</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 453_16_06_1986_Ε5_4825 Επιδότηση Πρακτικής από ΟΑΕΔ.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 453_16_06_1986_Ε5_4825 Επιδότηση Πρακτικής από ΟΑΕΔ</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ 572_16_08_1984_Ε5_5820 Αποζημίωση Ασκούμενων στο Δημόσιο Τομέα.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ 572_16_08_1984_Ε5_5820 Αποζημίωση Ασκούμενων στο Δημόσιο Τομέα</a>
                <a href="{{ asset('storage/documents/legislation/ΦΕΚ_173_13_11_1984_ΠΔ_483_Διευκολύνσεις σε Εργαζόμενους Φοιτητές.pdf') }}" class="list-group-item list-group-item-action" target="_blank">ΦΕΚ_173_13_11_1984_ΠΔ_483_Διευκολύνσεις σε Εργαζόμενους Φοιτητές</a>
            </div>
        </div>
    </div>
</div>
@endsection
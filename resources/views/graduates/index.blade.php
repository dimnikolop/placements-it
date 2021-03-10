@extends('layouts.admin')

@section('title', 'Απόφοιτοι')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="page-header-title">
            <h6>Graduates Table</h6>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('graduates.index') }}">Graduates Table</a></li>
            </ol>
        </nav>
    </div>
    <div class="card custom-admin-card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    <p class="mb-0"><i class="fas fa-check-circle"></i> <strong>Success!</strong>
                        {{ session('success') }}
                    </p>
                </div>
            @endif
            @if ($graduates->isNotEmpty())
                <div class="table-responsive">
                    <table id="graduatesTable" class="table table-hover custom-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Επώνυμο</th>
                                <th scope="col">Όνομα</th>
                                <th scope="col">Έτος αποφοίτησης</th>
                                <th scope="col">Πτυχίο</th>
                                <th scope="col">Θέση Απασχόλησης</th>
                                <th scope="col">Email</th>
                                <th scope="col">Αποδοχή/Απόρριψη</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            @else
                <h1 class="display-4 text-center">There are no graduates registered in database!</h1>
            @endif
        </div>
    </div>
</div>

<!-- Delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Are you sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to delete these records? This process cannot be undone.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <form id="deleteForm" action="" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    var data = @json($graduates);
    
    /* Formatting function for row details - modify as you need */
    function format(d) {
        // `d` is the original data object for the row
        let content = '';
        d.map = d.map === 1 ? 'On' : 'Off';

        content += '<div class="row mx-0 text-left">' +
            '<div class="col-12"><h5>Βασικά στοιχεία</h5></div>' +
            '<div class="col-md-4"><h6>Επώνυμο:</h6> ' + d.surname + '</div>' +
            '<div class="col-md-4"><h6>Όνομα:</h6> ' + d.name + '</div>' +
            '<div class="col-md-4"><h6>Όνομα Πατέρα:</h6> ' + d.father_name + '</div>' +
            '<div class="col-md-4"><h6>Έτος αποφοίτησης:</h6> ' + d.graduation_year + '</div>' +
            '<div class="col-md-4"><h6>Πτυχίο:</h6> ' + d.diploma + '</div>' +
            '<div class="col-md-4"><h6>Χάρτης:</h6> ' + d.map + '</div>' +
            '<div class="col-md-4"><h6>Email:</h6> ' + d.email + '</div>';
            
            if (d.phone) {
                content += '<div class="col-md-4"><h6>Τηλέφωνο:</h6> ' + d.phone + '</div>';
            }  
            if (d.website) {
                content += '<div class="col-md-4"><h6>Ιστότοπος:</h6> ' + d.website + '</div>';
            }
            
            content += '<div class="col-12"><h5 class="mt-3">Στοιχεία εργασίας</h5></div>' +
            '<div class="col-md-6"><h6>Εταιρεία:</h6> ' + d.employer + '</div>' +
            '<div class="col-md-6"><h6>Θέση Απασχόλησης:</h6> ' + d.job + '</div>' +
            '<div class="col-md-6"><h6>Διεύθυνση εργασίας:</h6> ' + d.work_address + ', ' + d.postal_code + '</div>' +
            '<div class="col-md-6"><h6>Πόλη:</h6> ' + d.city + '</div>';
            if (d.notes) {
                content += '<div class="col-12"><h5 class="mt-3">Σχόλιο</h5></div>' +
                            '<div class="col-12">' + d.notes + '</div>';
            }
            content += '</div>';

            return content;
    }

    $(document).ready(function () {
        var table = $('#graduatesTable').DataTable({
            "order": [],
            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": '<i class="fas fa-plus-circle"></i>'
                },
                { "data": "surname" },
                { "data": "name" },
                { "data": "graduation_year" },
                { "data": "diploma" },
                { "data": "job" },
                { "data": "email" },
                { 
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return  data.status === 'pending' ? 
                            '<div class="d-flex justify-content-between justify-content-lg-around">' +
                                '<form action="/graduate/' + data.id + '" method="post">' +
                                    '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                                    '<input type="hidden" name="_method" value="PATCH">' +
                                    '<button type="submit" class="btn btn-sm btn-outline-success" name="status" value="approved"><i class="fas fa-check fa-fw"></i> Accept</button>' +
                                '</form>' +
                                '<button type="button" class="btn btn-sm btn-outline-danger deleteBtn" data-toggle="modal" data-target="#deleteModal" data-url="/graduate/'+data.id+'"><i class="fas fa-times fa-fw"></i> Reject</button>' +
                            '</div>' :
                            '<button type="button" class="btn btn-sm btn-outline-danger deleteBtn" data-toggle="modal" data-target="#deleteModal" data-url="/graduate/'+data.id+'"><i class="fas fa-times fa-fw"></i> Delete</button>';
                    }
                }
            ],
            "data" : data
        });

        // Add event listener for opening and closing details
        $('#graduatesTable tbody').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if (row.child.isShown()) {
                // This row is already open - close it
                row.child.hide();
                tr.removeClass('shown');
                // Change icon
                $(this).html('<i class="fas fa-plus-circle"></i>');
            }
            else {
                // Open this row
                row.child(format(row.data())).show();
                tr.addClass('shown');
                // Change icon
                $(this).html('<i class="fas fa-minus-circle"></i>');
            }
        });
    });
</script>
@endpush
@extends('layouts.admin')

@section('title', 'Ασκούμενοι Φοιτητές')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="page-header-title">
            <h6>Πίνακας Ασκούμενων Φοιτητών</h6>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home fa-fw"></i></a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('trainees.index') }}">Πίνακας Ασκούμενων Φοιτητών</a></li>
            </ol>
        </nav>
    </div>
    <div class="card custom-admin-card">
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success w-75 mx-auto text-center" role="alert">
                    <i class="fas fa-check-circle"></i> <strong>Success!</strong> {{ session('success') }}
                </div>
            @endif
            @if ($trainees->isNotEmpty())
                <div class="table-responsive">
                    <table id="traineesTable" class="table custom-table" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Επώνυμο</th>
                                <th scope="col">Όνομα</th>
                                <th scope="col">Αριθμός Μητρώου</th>
                                <th scope="col">Εξάμηνο</th>
                                <th scope="col">Ακαδημαϊκή Χρονιά</th>
                                <th scope="col">Εταιρεία</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            @else
                <h1 class="display-4 text-center">There are no trainees in database!</h1>
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
    var data = @json($trainees);
    
    /* Formatting function for row details - modify as you need */
    function format(d) {
        // `d` is the original data object for the row
        let content = '';

        content += '<div class="row mx-0 text-left">' +
                        '<div class="col-12"><h5>Προσωπικά στοιχεία</h5></div>' +
                        '<div class="col-md-4"><h6>Επώνυμο:</h6> ' + d.lastname + '</div>' +
                        '<div class="col-md-4"><h6>Όνομα:</h6> ' + d.firstname + '</div>' +
                        '<div class="col-md-4"><h6>Αριθμός Μητρώου:</h6> ' + d.am + '</div>' +
                        '<div class="col-md-4"><h6>Email:</h6> ' + d.email + '</div>';
            
            if (d.phone) {
                content += '<div class="col-md-4"><h6>Τηλέφωνο:</h6> ' + d.phone + '</div>';
            }
            
            content += '<div class="col-12"><h5 class="mt-3">Στοιχεία πρακτικής άσκησης</h5></div>' +
                        '<div class="col-md-6"><h6>Εξάμηνο:</h6> ' + d.semester + '</div>' +
                        '<div class="col-md-6"><h6>Ακαδημαϊκή χρονιά:</h6> ' + d.season + '</div>' +
                        '<div class="col-md-6"><h6>Εταιρεία:</h6> ' + d.company + '</div>' +
                        '<div class="col-md-6"><h6>Θέση Απασχόλησης:</h6> ' + d.job + '</div>' +
                        '<div class="col-md-6"><h6>Ακαδημαϊκός επόπτης:</h6> ' + d.supervisor + '</div>' +
                    '</div>';

            return content;
    }

    $(document).ready(function () {
        var table = $('#traineesTable').DataTable({
            "order": [],
            "columns": [
                {
                    "className": 'details-control',
                    "orderable": false,
                    "data": null,
                    "defaultContent": '<i class="fas fa-plus-circle"></i>'
                },
                { "data": "lastname" },
                { "data": "firstname" },
                { "data": "am" },
                { "data": "semester" },
                { "data": "season" },
                { "data": "company" },
                { 
                    "data": null,
                    "render": function ( data, type, row, meta ) {
                        return  '<a class="btn btn-sm btn-outline-info mb-3 mb-xl-0" href="/admin/trainee/'+data.id+'/edit">' +
                                    '<i class="fas fa-pencil-alt fa-fw"></i> Edit' +
                                '</a>' +
                                '<button type="button" class="btn btn-sm btn-outline-danger ml-xl-3 deleteBtn" data-toggle="modal" data-target="#deleteModal" data-url="/admin/trainee/'+data.id+'">' +
                                    '<i class="far fa-trash-alt fa-fw"></i> Delete' +
                                '</button>';
                    }
                }
            ],
            "data" : data
        });

        // Add event listener for opening and closing details
        $('#traineesTable tbody').on('click', 'td.details-control', function () {
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
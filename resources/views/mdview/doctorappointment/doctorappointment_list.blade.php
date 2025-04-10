@extends('mdview.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
<style>
    .notwork {
        pointer-events: none;
    }
</style>
@endsection
@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="page-title">List of Doctors Appointment</h3>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-hover table-center mb-0 " id="manage-user">
                                    <thead class="text-center">
                                        <tr>
                                            <th>S.no</th>
                                            <th>No.Patient</th>
                                            <th>Service</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Amount</th>
                                            <th>Mode Payment</th>
                                            <th>Start Session</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



@endsection

@section('exrtajs')
<script>
    $(function() {
        // $.fn.tableload = function
        $('#manage-user').dataTable({
            "processing": true,
            pageLength: 10,
            "serverSide": true,
            "bDestroy": true,
            'checkboxes': {
                'selectRow': true
            },
            "ajax": {
                url: "{{ route('md.doctor.appointment.ajax')}}",
                "type": "POST",
                "data": function(d) {
                    d._token = "{{ csrf_token() }}";
                },
                dataFilter: function(data) {
                    var json = jQuery.parseJSON(data);
                    json.recordsTotal = json.recordsTotal;
                    json.recordsFiltered = json.recordsFiltered;
                    json.data = json.data;
                    return JSON.stringify(json); // return JSON string
                }
            },
            "order": [
                [1, 'desc']
            ],
            "columns": [{
                    "targets": 0,
                    "name": "id",
                    'searchable': false,
                    'orderable': true
                },
                {
                    "targets": 1,
                    "name": "name",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 2,
                    "name": "email",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 3,
                    "name": "gender",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 4,
                    "name": "phone",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 5,
                    "name": "phone",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 6,
                    "name": "phone",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 7,
                    "name": "phone",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 8,
                    "name": "phone",
                    'searchable': true,
                    'orderable': true
                },


            ]

        });
        $('body').on('click', '.ancherTag', function() {

            alert('h');
        });
        $('body').on('click', '.CancleTag', function() {

            alert('re');
        });




    });
</script>
@endsection
@extends('userview.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">

<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<link rel="stylesheet" href="{{asset('build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('build/css/demo.css')}}">
@endsection
@section('content')<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="page-wrapper">
        <div class="content container-fluid">

            <div class="page-header">
                <div class="row m-2">
                    <div class="col-sm-12 col-lg-10">
                        <h3 class="page-title">List of Appointments</h3>

                    </div>
                    <div class="col-sm-12 col-lg-2">
                        <a href="{{route('user.appointment.create.show')}}" class="btn w-100 btn-outline-warning">Add Appointmemt</a>

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
                                            <th>Sno</th>
                                            <th>Total Patient</th>
                                            <th>Service</th>
                                            <th>Time</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Mode Of Payment</th>
                                            <th>Appointmemt Status</th>
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


@section('exrtajs')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6FjTNtaiuf3PGaAVvVFHYgc6M_tdM24k&callback=initMap&libraries=places&v=weekly" async></script>

<script>
    $(function() {
        $('#manage-user').dataTable({
            "processing": true,
            pageLength: 10,
            "serverSide": true,
            "bDestroy": true,
            'checkboxes': {
                'selectRow': true
            },
            "ajax": {
                url: "{{ route('user.appointment.ajax')}}",
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
                    "name": "gender",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 5,
                    "name": "gender",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 6,
                    "name": "gender",
                    'searchable': true,
                    'orderable': true
                },
                {
                    "targets": 7,
                    "name": "gender",
                    'searchable': true,
                    'orderable': true
                },


            ]

        });
        $('body').on('click', '.status_item', function() {
            let id = $(this).data('id');
            let status = $(this).data('status');
            var fd = new FormData();
            fd.append('_token', "{{ csrf_token() }}");
            fd.append('id', id);
            fd.append('status', status);

            $.ajax({
                type: 'POST',
                url: "{{ route('user.appointment.status') }}",
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function(result) {

                    if (result.status) {

                        iziToast.success({
                            message: result.msg,
                            position: 'topRight'
                        });
                        $('#manage-user').DataTable().ajax.reload(null, false);


                    } else {
                        iziToast.error({
                            message: result.msg,
                            position: 'topRight'
                        });
                    }
                },
                complete: function() {},
                error: function(jqXHR, exception) {}


            });

        });


    });
</script>
@endsection
@endsection
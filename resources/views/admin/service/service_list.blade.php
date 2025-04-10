@extends('admin.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
@endsection
@section('content')
@section('pagename')
<a class="navbar-brand ml-5" style="color: #242423;" href="#">Items List</a>
@endsection
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header d-flex justify-content-between">
            {{-- <div class="row"> --}}
                {{-- <div class="col-sm-12"> --}}
                    <h3 class="page-title d-inline">List Of Services</h3>
                    <a href="#Add_service" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add Service</a>
                {{-- </div> --}}
            {{-- </div> --}}
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0 " id="manage_service">
                                <thead class="text-center">
                                    <tr>
                                        <th>S No.</th>
                                        <th>Service</th>
                                        <th>Price</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
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

<div class="modal fade" id="Add_service" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Add Service</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form id="add_service_submit">
    <div class="row form-row">
    <div class="col-sm-12">
    <div class="form-group">
    <label>Service</label>
    <input type="text" class="form-control" name="service">
    </div>
    </div>
    </div>
    <div class="row form-row">
        <div class="col-sm-12">
        <div class="form-group">
        <label>Price</label>
        <input type="number" class="form-control" name="price">
        </div>
        </div>
        </div>
    <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
    </div>
    </div>
    </div>
    </div>


    <div class="modal fade" id="edit_service" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Edit Service</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="edit_service_submit">
        <div class="row form-row">
        <div class="col-sm-12">
        <div class="form-group">
        <label>Service</label>
        <input type="text" class="form-control" id="service" name="service">
        <input type="hidden" class="form-control" id="id" name="id">

        </div>
        </div>
        </div>
        <div class="row form-row">
            <div class="col-sm-12">
            <div class="form-group">
            <label>Price</label>
            <input type="number" class="form-control" id="price" name="price">
            </div>
            </div>
            </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
        </div>
        </div>
        </div>
        </div>






@section('exrtajs')
<script>
    $(function() {
        // $.fn.tableload = function
        $('#manage_service').dataTable({
            "processing": true,
            pageLength: 10,
            "serverSide": true,
            "bDestroy": true,
            'checkboxes': {
                'selectRow': true
            },
            "ajax": {
                url: "{{ route('admin.service_ajax_list')}}",
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
                    "targets": 4,
                    "name": "phone",
                    'searchable': true,
                    'orderable': true
                },


            ]

        });
        $('body').on('click', '.edit_item', function() {


            let body = $(this).parent();
            let id = $(this).data('id');
            let service = $(this).data('service');
            let price = $(this).data('price');

            $('#id').val(id);
            $('#service').val(service);
            $('#price').val(price);
            $('#edit_service').modal('show');





        });
        $('body').on('click', '.delete_item', function() {

let body = $(this).parent();
let id = $(this).data('id');

var fd = new FormData();
fd.append('_token', "{{ csrf_token() }}");
fd.append('id', id);

$.ajax({
    type: 'POST',
    url: "{{ route('admin.service.delete') }}",
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
            $('#manage_service').DataTable().ajax.reload(null, false);


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



        $('body').on('click', '.status_item', function() {

let body = $(this).parent();
let id = $(this).data('id');
let status = $(this).data('status');
var fd = new FormData();
fd.append('_token', "{{ csrf_token() }}");
fd.append('id', id);
fd.append('status', status);

$.ajax({
    type: 'POST',
    url: "{{ route('admin.service.status') }}",
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
            $('#manage_service').DataTable().ajax.reload(null, false);


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

        $('body').on('click', '.permission', function() {
            alert('hel');
        });

        // $('#add_role_submit').submit(function(e){


        //     e.privenDefault();
        //     alert("dkjhfjd");exit;

        // })
        $('#add_service_submit').submit(function(e) {

e.preventDefault();
var fd = new FormData(this);
fd.append('_token', "{{ csrf_token() }}");
$.ajax({
    type: 'POST',
    url: "{{ route('admin.add_service')}}",
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
    $('#manage_service').DataTable().ajax.reload(null, false);
    $("#add_service_submit")[0].reset();
    $('#Add_service').modal('toggle');



} else {
    iziToast.error({
        message: result.msg,
        position: 'topRight'
    });
    $("#add_role_submit")[0].reset();
    $('#Add_role').modal('toggle');
}
},

});
});

$('#edit_service_submit').submit(function(e) {

e.preventDefault();
var fd = new FormData(this);
fd.append('_token', "{{ csrf_token() }}");
$.ajax({
    type: 'POST',
    url: "{{ route('admin.edit_service')}}",
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
    // $("#edit_service_submit")[0].reset();
    $('#edit_service').modal('toggle');
    $('#manage_service').DataTable().ajax.reload(null, false);


} else {
    iziToast.error({
        message: result.msg,
        position: 'topRight'
    });
    $("#add_role_submit")[0].reset();
    $('#Add_role').modal('toggle');
}
},

});
});



    });
</script>
@endsection
@endsection

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
                    <h3 class="page-title d-inline">List Of Role</h3>
                    <a href="#Add_role" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add Role</a>
                {{-- </div> --}}
            {{-- </div> --}}
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="datatable table table-hover table-center mb-0 " id="manage-user">
                                <thead class="text-center">
                                    <tr>
                                        <th>S No.</th>
                                        <th>role name</th>
                                        <th>permission</th>
                                        <th>Status</th>
                                        <th>delete</th>
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

<div class="modal fade" id="Add_role" aria-hidden="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h5 class="modal-title">Add Role</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
    <form id="add_role_submit">
    <div class="row form-row">
    <div class="col-sm-12">
    <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control" name="role">
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
        $('#manage-user').dataTable({
            "processing": true,
            pageLength: 10,
            "serverSide": true,
            "bDestroy": true,
            'checkboxes': {
                'selectRow': true
            },
            "ajax": {
                url: "{{ route('role.ajax.admin')}}",
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


            ]

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
                url: "{{ route('role.status.admin') }}",
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
        $('body').on('click', '.delete_item', function() {

let body = $(this).parent();
let id = $(this).data('id');

var fd = new FormData();
fd.append('_token', "{{ csrf_token() }}");
fd.append('id', id);

$.ajax({
    type: 'POST',
    url: "{{ route('role.delete.admin') }}",
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

        $('body').on('click', '.permission', function() {
            alert('hel');
        });

        // $('#add_role_submit').submit(function(e){


        //     e.privenDefault();
        //     alert("dkjhfjd");exit;

        // })
        $('#add_role_submit').submit(function(e) {

e.preventDefault();
var fd = new FormData(this);
fd.append('_token', "{{ csrf_token() }}");
$.ajax({
    type: 'POST',
    url: "{{ route('admin.add_role')}}",
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
    $("#add_role_submit")[0].reset();
    $('#Add_role').modal('toggle');



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

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

      <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="page-title">List of Doctors</h3>

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
                              <th>S No.</th>
                              <th>Doctor Name</th>

                              <th>Photo</th>
                              <th>Profile</th>
                              <th>Status</th>
                              <th>SeniorMD Approval</th>


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
<script>
   $(function() {
      // $.fn.tableload = function() {
      $('#manage-user').dataTable({
         "processing": true,
         pageLength: 10,
         "serverSide": true,
         "bDestroy": true,
         'checkboxes': {
            'selectRow': true
         },
         "ajax": {
            url: "{{ route('approval.mddoctor.ajax.admin')}}",
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

         ]

      });
      $('body').on('click', '.status_admin', function() {

         let body = $(this).parent();
         let id = $(this).data('id');
         let status = $(this).data('status');
         var fd = new FormData();
         fd.append('_token', "{{ csrf_token() }}");
         fd.append('id', id);
         fd.append('status', status);

         $.ajax({
            type: 'POST',
            url: "{{ route('approval.mddoctor.status.admin') }}",
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

      $('body').on('click', '.status_item', function() {
         alert('he');
         let id = $(this).data('id');
         let status = $(this).data('status');
         var fd = new FormData();
         fd.append('_token', "{{ csrf_token() }}");
         fd.append('id', id);
         fd.append('status', status);

         $.ajax({
            type: 'POST',
            url: "{{ route('approval.mddoctor.status.seniormd.admin') }}",
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
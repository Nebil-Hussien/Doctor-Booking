@extends('userview.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<link rel="stylesheet" href="{{asset('build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('build/css/demo.css')}}">
@endsection
@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
   <div class="row ">
      <div class="col-10 ">
         <h3>Family List</h3>
      </div>
      <div class="col-2 justify-right">
         @if($countfamily < Auth()->guard('user')->user()->family_size)
            <a href={{route('user.family.add.show')}} class="btn btn-primary btn-sm ">Add New Member</a>
            @else
            <a class="btn btn-primary btn-sm  add_button" data-id="{{Auth()->guard('user')->user()->family_size}}">Add
               New Member</a>
            @endif
      </div>
   </div>
   <div class="row">
      <div class="col-md-12">

         <div class="appointment-tab">
            <div class="tab-content ">

               <div class="tab-pane show active" id="upcoming-appointments">
                  <div class="card card-table mb-0">

                     <div class="card-body">
                        <div class="table-responsive p-4">
                           <table class="table table-hover table-center mb-0 " id="manage-user">
                              <thead class="text-center">
                                 <tr>
                                    <th>Profile</th>
                                    <th>Name</th>
                                    <th>Relation</th>
                                    <th>Date Of Birth</th>
                                    <th>Age</th>
                                    <th>Blood Group</th>
                                    <th>Action</th>
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
</div>



@section('exrtajs')

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
               url: "{{ route('user.family.ajax')}}",
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
                   "targets": 5,
                   "name": "phone",
                   'searchable': true,
                   'orderable': true
               },

           ]

       });
       $('body').on('click', '.delete_item', function() {

let body = $(this).parent();
let id = $(this).data('id');
var fd = new FormData();
var r =confirm("are you sure want to delete!");
                          if (r == true) {
fd.append('_token', "{{ csrf_token() }}");
fd.append('id', id);
$.ajax({
type: 'POST',
url: "{{ route('user.family.delete')}}",
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
                          }


});
$('.add_button').on('click',function(e){
var value =$(this).attr('data-id');
   swal({
  title: "You have already added "+value+" family member",
//   text: "You clicked the button!",
  icon: "success",
});
   }
);


   });
</script>

@endsection
@endsection
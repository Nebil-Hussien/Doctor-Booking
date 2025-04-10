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
            <div class="col">
               <h3 class="page-title">Profile</h3>

            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-md-12">
            <div class="profile-header">
               <div class="row align-items-center">
                  <div class="col-auto profile-image">
                     <a href="#">
                        <img class="rounded-circle" alt="User Image" src="{{asset($details->profile)}}">
                     </a>
                  </div>
                  <div class="col ml-md-n2 profile-user-info">
                     <h4 class="user-name mb-0">{{$details->name}}</h4>
                     <h6 class="text-muted">{{$details->email}}
                     </h6>
                     <div class="user-Location"><i class="fa fa-map-marker"></i>{{$details->address}}</div>
                     <div class="about-text">{{$details->biography}}</div>
                  </div>

               </div>
            </div>
            <div class="profile-menu">
               <ul class="nav nav-tabs nav-tabs-solid">
                  <li class="nav-item">
                     <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Personal Details</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Education</a>
                  </li>
                  {{-- <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="tab" href="#password_tab">Contact us</a>
                  </li> --}}
               </ul>
            </div>
            <div class="tab-content profile-tab-cont">

               <div class="tab-pane fade show active" id="per_details_tab">

                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                              <!-- <h5 class="card-title d-flex justify-content-between">
                                 <span>Personal Details</span>
                                 <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit me-1"></i>Edit</a>
                              </h5> -->
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                 <p class="col-sm-10">{{$details->name}}</p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">specialization
                                 </p>
                                 <p class="col-sm-10">{{$specilisation}}</p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Date of Birth</p>
                                 <p class="col-sm-10">{{$details->date_of_birth}}</p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
                                 <p class="col-sm-10">{{$details->email}}</a>
                                 </p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                 <p class="col-sm-10">305-310-5857</p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0">Address</p>
                                 <p class="col-sm-10 mb-0">{{$details->address}}<br>
                                    {{-- {{$details->country}}<br>
                                    {{$details->state}}<br>
                                    {{$details->city}}
                                 </p> --}}
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>


               <!-- <div id="password_tab" class="tab-pane fade">
                  {{-- <div class="profile-menu">
                     <ul class="nav nav-tabs nav-tabs-solid">
                        <li class="nav-item">
                           <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Personal Details</a>
                        </li>
                     </ul>
                  </div> --}}
                  <div class="card">
                     <div class="card-body">
                        <h5 class="card-title">Education Details</h5>
                        <div class="row">
                           <div class="col-md-10 col-lg-12">
                              <table class="table table-hover">
                                 <thead>
                                    <tr>
                                       <th scope="col">#</th>
                                       <th scope="col">Degree</th>
                                       <th scope="col">College Name</th>
                                       <th scope="col">Year Of Pass Out</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @foreach($educatioDetails as $key =>$obj)
                                    <tr>
                                       <th scope="row">{{$key+1}}</th>
                                       <td>{{$obj->degree}}</td>
                                       <td>{{$obj->college}}</td>
                                       <td>{{$obj->year_of_completion}}</td>
                                    </tr>
                                    @endforeach


                                 </tbody>
                              </table>


                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
               <div class="tab-pane fade d-hidden active" id="password_tab">
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="card">
                           <div class="card-body">
                              <div class="table-responsive">
                                 <table class="datatable table table-hover table-center mb-0 " id="manage-user">
                                    <thead class="text-center">
                                       <tr>
                                          <th>Sno</th>
                                          <th>Degree</th>
                                          <th>Collage/school</th>
                                          <th>Document</th>
                                          <th>Year Of Passout</th>

                                          <th>SeniorMd Approval</th>
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
   </div>
</div>

</div>

@section('exrtajs')
<script>
   let val = '<?= $details->id ?>';

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
            url: "{{ route('seniormddoctor.profile.eduction.admin')}}",
            "type": "POST",
            "data": function(d) {
               d._token = "{{ csrf_token() }}";
               d.id = val;
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
            url: "{{ route('seniormddoctor.profile.eduction.status.admin') }}",
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
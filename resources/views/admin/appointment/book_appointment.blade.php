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
                     <h4 class="user-name mb-0">{{$details->first_name}} {{$details->middle_name}} {{$details->last_name}}</h4>
                     <h6 class="text-muted">{{$details->email}}
                     </h6>
                     <div class="user-Location"><i class="fa fa-map-marker"></i>{{$details->address}}</div>
                     <div class="about-text">{{$details->medical_notes}}</div>
                  </div>

               </div>
            </div>
            <div class="profile-menu">
               <ul class="nav nav-tabs nav-tabs-solid">
                  <li class="nav-item">
                     <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Personal Details</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" data-bs-toggle="tab" href="#family_tab">Family Detail</a>
                  </li>
               </ul>
            </div>
            <div class="tab-content profile-tab-cont">

               <div class="tab-pane fade show active" id="per_details_tab">

                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                              <h5 class="card-title d-flex justify-content-between">
                                 <span>Personal Details</span>
                                 <!-- <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit me-1"></i>Edit</a> -->
                              </h5>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Name</p>
                                 <p class="col-sm-10">{{$details->first_name}} {{$details->middle_name}} {{$details->last_name}}</p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Age</p>
                                 <p class="col-sm-10">{{$details->age}}</p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Email ID</p>
                                 <p class="col-sm-10">{{$details->email}}</a>
                                 </p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0 mb-sm-3">Mobile</p>
                                 <p class="col-sm-10">{{$details->phone}}</p>
                              </div>
                              <div class="row">
                                 <p class="col-sm-2 text-muted text-sm-end mb-0">Address</p>
                                 <p class="col-sm-10 mb-0">{{$details->address}}<br>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>

               <div id="family_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between ">
                                <div class="col-sm-12 col-xl-8 col-lg-8 ">
                                    <h5 class="page-title">Experience</h5>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-sm-12 text-center">
                                    <a href="{{route('patient.family.register.admin', base64_encode($details->id))}}" class="btn w-100 btn-outline-primary">Add Family</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-lg-12">
                                    <table class="table table-hover" id="manage-experience">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Full Name</th>
                                            <th scope="col">Relation</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Gender</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($userFamilies as $key =>$obj)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$obj->name}}</td>
                                                <td>{{$obj->relation}}</td>
                                                <td>{{$obj->age}}</td>
                                                <td>{{$obj->gender}}</td>
                                                <td>
                                                    <a href="{{route('patient.family.edit.admin', base64_encode($obj->id))}}" class="btn btn-success btn-sm"><i class="fe fe-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm   delete_family_item" data-id = "{{$obj->id}}" data-name = "{{$obj->name}}"><span class="fe fe-trash"></span></a>
                                                </td>
                                            </tr>
                                        @endforeach
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
@section('exrtajs')
    <script>
        $(function() {
            $('body').on('click', '.delete_family_item', function() {

                let body = $(this).parent();
                let id = $(this).data('id');
                var fd = new FormData();
                fd.append('_token', "{{ csrf_token() }}");
                fd.append('id', id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('patient.delete.family.admin') }}",
                    data: fd,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(result) {

                        if (result.status === true) {

                            iziToast.success({
                                message: result.msg,
                                position: 'topRight'
                            });
                            setInterval(location.reload(), 10000);
                            window.location.href = "/admin/patient";
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

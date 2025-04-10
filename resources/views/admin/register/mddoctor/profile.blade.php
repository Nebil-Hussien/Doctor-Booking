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
                              <h5 class="card-title d-flex justify-content-between">
                                 <span>Personal Details</span>
                                 <!-- <a class="edit-link" data-bs-toggle="modal" href="#edit_personal_details"><i class="fa fa-edit me-1"></i>Edit</a> -->
                              </h5>
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

                        <div class="modal fade" id="edit_personal_details" aria-hidden="true" role="dialog">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                    <h5 class="modal-title">Personal Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                 </div>
                                 <div class="modal-body">
                                    <form>
                                       <div class="row form-row">
                                          <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" value="Jillan">
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" value="Doe">
                                             </div>
                                          </div>
                                          <div class="col-12">
                                             <div class="form-group">
                                                <label>Date of Birth</label>
                                                <div class="cal-icon">
                                                   <input type="text" class="form-control datetimepicker" value="24-07-1983">
                                                </div>
                                             </div>
                                          </div>

                                          <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label>Email ID</label>
                                                <input type="email" class="form-control" value="Jillandoe@example.com">
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label>Mobile</label>
                                                <input type="text" value="+1 202-555-0125" class="form-control">
                                             </div>
                                          </div>
                                          <div class="col-12">
                                             <h5 class="form-title"><span>Address</span></h5>
                                          </div>
                                          <div class="col-12">
                                             <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" value="4663 Agriculture Lane">
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label>City</label>
                                                <input type="text" class="form-control" value="Miami">
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label>State</label>
                                                <input type="text" class="form-control" value="Florida">
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label>Zip Code</label>
                                                <input type="text" class="form-control" value="22434">
                                             </div>
                                          </div>
                                          <div class="col-12 col-sm-6">
                                             <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" value="United States">
                                             </div>
                                          </div>
                                       </div>
                                       <button type="submit" class="btn btn-primary w-100">Save Changes</button>
                                    </form>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>

               </div>


               <div id="password_tab" class="tab-pane fade">
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
               </div>

            </div>
         </div>
      </div>
   </div>
</div>

</div>

@section('exrtajs')
@endsection
@endsection
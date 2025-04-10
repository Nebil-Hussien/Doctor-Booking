@extends('mdview.layout.app')
@section('exrtacss')
    <link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/upload.css')}}">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
@endsection
@section('content')
    <div class="col-md-7 col-lg-8 col-xl-9">
        <div class="row">
            <div class="col-md-12">
                <div class="card dash-card">
                    <div class="card-body">
                        <div class="row">
                            <h2 class="mb-4">My Profile</h2>
                            <div class="col-md-12 col-lg-4">
                                <div class="dash-widget dct-border-rht">
                                    <div class="row align-items-center">
                                        <div class="col-auto profile-image">
                                            <a href="#">
                                                <img style="width: 200px; height: 200px;" class="rounded-circle" alt="User Image" src="{{asset($details->profile)}}">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 col-lg-6">
                                <div class="dash-widget dct-border-rht">
                                    <div class="col ml-md-n2 profile-user-info">
                                        <h4 class="user-name mb-0">{{$details->first_name}} {{$details->middle_name}} {{$details->last_name}}</h4>
                                        <h6 class="text-muted">{{$details->email}}
                                        </h6>
                                        <div class="user-Location"><i class="fa fa-map-marker"></i>{{$details->address}}</div>
                                        <div class="about-text">{{$details->biography}}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="profile-menu">
                <ul class="nav nav-tabs nav-tabs-solid">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#per_details_tab">Personal Details</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#education_tab">Education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#experience_tab">Experience</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#services_tab">Service Detail</a>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div id="education_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between ">
                                <div class="col-sm-12 col-xl-8 col-lg-8 ">
                                    <h5 class="page-title">Education Details</h5>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-sm-12 text-center">
                                    <a href="{{route('mddoctor.education.register.admin', base64_encode($details->id))}}" class="btn w-100 btn-outline-primary">Add Education</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-lg-12">
                                    <table class="table table-hover" id="manage-education">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Field of Study</th>
                                            <th scope="col">Graduated From</th>
                                            <th scope="col">Year Of Completion</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($educatioDetails as $key =>$obj)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$obj->field_of_study}}</td>
                                                <td>{{$obj->graduated_from}}</td>
                                                <td>{{$obj->year_of_completion}}</td>
                                                <td>
                                                    <a href="{{route('mddoctor.education.edit.register.admin', base64_encode($obj->id))}}" class="btn btn-success btn-sm"><i class="fe fe-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm   delete_edu_item" data-id = "{{$obj->id}}" data-name = "{{$obj->field_of_study}}"><span class="fe fe-trash"></span></a>
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

                <div id="experience_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between ">
                                <div class="col-sm-12 col-xl-8 col-lg-8 ">
                                    <h5 class="page-title">Experience</h5>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-sm-12 text-center">
                                    <a href="{{route('mddoctor.experience.register.admin', base64_encode($details->id))}}" class="btn w-100 btn-outline-primary">Add Experience</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-lg-12">
                                    <table class="table table-hover" id="manage-experience">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Employer Name</th>
                                            <th scope="col">Designation</th>
                                            <th scope="col">Years of Experience</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($experienceDetails as $key =>$obj)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$obj->employer_name}}</td>
                                                <td>{{$obj->designation}}</td>
                                                <td>{{$obj->year_experience}}</td>
                                                <td>
                                                    <a href="{{route('mddoctor.experience.edit.register.admin', base64_encode($obj->id))}}" class="btn btn-success btn-sm"><i class="fe fe-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm   delete_exp_item" data-id = "{{$obj->id}}" data-name = "{{$obj->field_of_study}}"><span class="fe fe-trash"></span></a>
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

                <div id="services_tab" class="tab-pane fade">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between ">
                                <div class="col-sm-12 col-xl-8 col-lg-8 ">
                                    <h5 class="page-title">Service Details</h5>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-sm-12 text-center">
                                    <a href="{{route('mddoctor.service.register.admin', base64_encode($details->id))}}" class="btn w-100 btn-outline-primary">Add Service</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-10 col-lg-12">
                                    <table class="table table-hover" id="manage-service">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Specialization</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($serviceDetails as $key =>$obj)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$obj->service}}</td>
                                                <td>{{$obj->specialization}}</td>
                                                <td>
                                                    <a href="{{route('mddoctor.service.edit.register.admin', base64_encode($obj->id))}}" class="btn btn-success btn-sm"><i class="fe fe-pencil"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm   delete_service_item" data-id = "{{$obj->id}}" data-name = "{{$obj->field_of_study}}"><span class="fe fe-trash"></span></a>
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
@section('exrtajs')
    <script>
        $(function() {
            $('body').on('click', '.delete_edu_item', function() {

                let body = $(this).parent();
                let id = $(this).data('id');
                var fd = new FormData();
                fd.append('_token', "{{ csrf_token() }}");
                fd.append('id', id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('mddoctor.delete.education.admin') }}",
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
                            window.location.href = "/admin/medicalDoctor";
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
            $('body').on('click', '.delete_exp_item', function() {

                let body = $(this).parent();
                let id = $(this).data('id');
                var fd = new FormData();
                fd.append('_token', "{{ csrf_token() }}");
                fd.append('id', id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('mddoctor.delete.experience.admin') }}",
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
                            window.location.href = "/admin/medicalDoctor";
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
            $('body').on('click', '.delete_service_item', function() {

                let body = $(this).parent();
                let id = $(this).data('id');
                var fd = new FormData();
                fd.append('_token', "{{ csrf_token() }}");
                fd.append('id', id);
                $.ajax({
                    type: 'POST',
                    url: "{{ route('mddoctor.delete.service.admin') }}",
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
                            window.location.href = "/admin/medicalDoctor";
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

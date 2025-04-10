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
                            <h2 class="mb-4">Patient Profile</h2>
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
                                        <div class="about-text">{{$details->medical_notes}}</div>
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
                                    <h5 class="page-title">Family Detail</h5>
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
@endsection

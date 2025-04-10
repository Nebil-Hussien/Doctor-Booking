@extends('mdview.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<link rel="stylesheet" href="{{asset('build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('build/css/demo.css')}}">
<style>

</style>

@endsection
@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
    <div class="card p-4">
        <div class="row">
            <h3>Appointment Details</h3>
            <div class="col-12">

                <div class="card  p-0">
                    <div class="card p-2 pt-3 " style="background-color:grey">
                        <h5 style="color:white">User Details</h5>
                    </div>

                    <div class="row p-2">
                        <div class="col-lg-3 col-xl-3 col-sm-12">
                            <a href="#">
                                <img alt="User Image" src="{{asset($detail->profile)}}">
                            </a>
                        </div>

                        <div class="col-lg-9 col-xl-9 col-sm-12">
                            <p><strong>Name</strong> : {{$detail->name}} </p>
                            <p><strong>Email</strong> : {{$detail->email}} </p>
                            <p><strong>Phone</strong> : {{$detail->phone}} </p>
                            <p><strong>Age</strong> : {{$detail->age}} </p>
                            <p><strong>Address</strong> : {{$detail->address}} </p>

                        </div>

                    </div>
                </div>
                <div class="card p-0">
                    <div class="card p-2 pt-3 " style="background-color:grey">
                        <h5 style="color:white">Appointment Details</h5>
                    </div>

                    <div class="row p-2">
                        <div class="col-lg-6 col-xl-6 col-sm-12">
                            <p><strong>Total Patient</strong> : {{$detail->no_patient}} </p>
                            <p><strong>Service Type</strong> : {{$detail->service}} </p>
                            <p><strong>Amount</strong> : ₹ {{$detail->price}} </p>
                        </div>
                        <div class="col-lg-6 col-xl-6 col-sm-12">
                            <p><strong>Date</strong> : {{$detail->date}} </p>
                            <p><strong>Time</strong> : {{$detail->start_time}} </p>
                            <p><strong>Mode Paymnet</strong> : {{$detail->payment_type}} </p>
                        </div>

                    </div>
                </div>
                <div class="card p-0">
                    <div class="card p-2 pt-3 " style="background-color:grey">
                        <h5 style="color:white">Patient List </h5>
                    </div>



                    <div class="row p-2">
                        <div class="col-md-10 col-lg-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Blood Group</th>
                                        <th scope="col">Date Of Birth</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Start Session</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i = 0;
                                    @endphp
                                    @if(!empty($pacientUserDetail))

                                    <tr>

                                        <th scope="row">{{$i+1}}</th>
                                        <td>{{$pacientUserDetail->name}}</td>
                                        <td>{{$pacientUserDetail->age}}</td>
                                        <td>{{$pacientUserDetail->blood_type}}</td>
                                        <td>{{$pacientUserDetail->dob}}</td>
                                        <td>{{$pacientUserDetail->gender}}</td>
                                        <td><a href="" class="btn  btn-outline-info">start session</a></td>

                                    </tr>
                                    @php
                                    $i = $i +1;
                                    @endphp
                                    @endif


                                    @foreach($pacientDetail as $key =>$obj)

                                    <tr>

                                        <th scope="row">{{$key+$i+1}}</th>
                                        <td>{{$obj->name}}</td>
                                        <td>{{$obj->age}}</td>
                                        <td>{{$obj->blood_type}}</td>
                                        <td>{{$obj->dob}}</td>
                                        <td>{{$obj->gender}}</td>
                                        <td><a href="" class="btn  btn-outline-info">start session</a></td>

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



    @section('exrtajs')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>


    @endsection
    @endsection
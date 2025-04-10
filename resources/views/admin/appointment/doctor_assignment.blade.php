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
               <h3 class="page-title">Book Appointment</h3>
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

            <div class="tab-content profile-tab-cont">

               <div class="tab-pane fade show active" id="per_details_tab">

                  <div class="row">
                     <div class="col-lg-12">
                        <div class="card">
                           <div class="card-body">
                               <div class="row form-row">
                                   <form method="POST" action="#" class="profileedit">
                                       <div class="card">
                                           <div class="card-body">
                                               <div class="row form-row">
                                                   <input type="hidden" class="form-control" name="user_id" value="{{$details->id}}">
                                                   <div class="col-12 col-sm-6">
                                                       <div class="form-group">
                                                           <label>No of Patients</label>
                                                           <input type="number" class="form-control" name="no_patient" value="" required>
                                                       </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                       <div class="form-group">
                                                           <label>Service Type</label>
                                                           <select class="form-select form-control" name="service_type" required>
                                                               @foreach($serviceType as $Type){
                                                               <option value="{{ $Type->id }}">{{ $Type->service }}</option>
                                                               @endforeach
                                                           </select>
                                                       </div>
                                                   </div>
                                                   <div class="col-md-6">
                                                       <div class="form-group mb-0">
                                                           <label>Appointment Date</label>
                                                           <input type="date" class="form-control" name="date" value="" required>
                                                       </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                       <div class="form-group">
                                                           <label>Start Time</label>
                                                           <input type="time" class="form-control" name="start_time" value="" required>
                                                       </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                       <div class="form-group">
                                                           <label>Price</label>
                                                           <input type="text" class="form-control" name="price" value="" required>
                                                       </div>
                                                   </div>
                                                   <div class="col-12 col-sm-6">
                                                       <div class="form-group">
                                                           <label>Payment Type</label>
                                                           <select class="form-select form-control" name="payment_type" required>
                                                               <option>Select</option>
                                                               <option>Cash</option>
                                                               <option>Online</option>
                                                               <option>Wallet</option>
                                                           </select>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>
                                       </div>
                                       <div class="submit-section submit-btn-bottom">
                                           <button type="submit" class="btn btn-primary submit-100 ">Book Now</button>
                                       </div>
                                   </form>
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
        $('.profileedit').submit(function(e) {
            e.preventDefault();
            var fd = new FormData(this);



            fd.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('patient.appointment.book') }}",
                type: "post",
                data: fd,
                dataType: "JSON",
                processData: false,
                contentType: false,
                beforeSend: function() {
                    //  $('.generalsets').prop('disabled', true);
                },
                success: function(result) {

                    if (result.status === true) {

                        iziToast.success({
                            message: result.msg,
                            position: 'topRight'
                        });
                        setInterval(location.reload(), 10000);

                    } else {
                        iziToast.error({
                            message: result.msg,
                            position: 'topRight'
                        });
                    }
                }
            })

        });
    </script>
@endsection

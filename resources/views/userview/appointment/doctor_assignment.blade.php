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
               <h3 class="page-title">Doctor Assignment</h3>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <div class="profile-header">
               <div class="row align-items-center">
                  <div class="col-auto profile-image">
                     <a href="#">
                        <img class="rounded-circle" alt="User Image" src="{{asset($userDetail->profile)}}">
                     </a>
                  </div>
                  <div class="col ml-md-n2 profile-user-info">
                     <h4 class="user-name mb-0">{{$userDetail->first_name}} {{$userDetail->middle_name}} {{$userDetail->last_name}}</h4>
                     <h6 class="text-muted">{{$userDetail->email}}
                     </h6>
                     <div class="user-Location"><i class="fa fa-map-marker"></i>{{$userDetail->address}}</div>
                     <div class="schedule-date">Schedule Date: {{$details->date}}</div>
                     <div class="schedule-time">Schedule Time: {{$details->start_time}}</div>
                     <div class="about-text">{{$userDetail->medical_notes}}</div>
                  </div>

               </div>
            </div>

            <div class="tab-content profile-tab-cont">

               <div class="tab-pane fade show active" id="per_details_tab">
                   <div class="row">
                       <div class="col-md-10 col-lg-12">
                           <table class="table table-hover" id="manage-education" style="width:400px; border: 1px solid black">
                               <thead>
                               <tr bgcolor="#01B0F1">
                                   <th scope="col"><h4>Doctors List</h4></th>
                                   <th scope="col"><h4>Assign</h4></th>
                               </tr>
                               </thead>
                               <tbody>
                               @foreach($doctors as $key =>$obj)
                                   <tr>
                                       <th scope="row">
                                           <div class="city">
                                               <h5>{{$obj->first_name}} {{$obj->middle_name}} {{$obj->last_name}}</h5>
                                               <div class="address"><i class="fa fa-map-marker"></i>{{$obj->address}}</div>
                                               <div class="phone"><i class="fa fa-phone"></i>{{$obj->phone}}</div>
                                           </div>
                                       </th>
                                       <td style="text-align: center;  vertical-align: middle;">
                                           <button class="status_item fa fa-universal-access" data-doctor="{{$obj->id}}" data-id="{{$details->id}}"></button>
                                       </td>
                                   </tr>
                               @endforeach
                               </tbody>
                           </table>
                       </div>
                       <div class="col-md-10 col-lg-12">
                           <div class="row">
                               <div class="col-xs-12">
                                   <div id="map"></div>
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
        $('body').on('click', '.status_item', function() {

            let body = $(this).parent();
            let id = $(this).data('id');
            let doctor = $(this).data('doctor');
            var fd = new FormData();
            fd.append('_token', "{{ csrf_token() }}");
            fd.append('id', id);
            fd.append('doctor_id', doctor);

            $.ajax({
                type: 'POST',
                url: "{{ route('doctor.appointment.assigned.admin') }}",
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
                        setInterval(location.reload(), 10000);

                        let url = "{{ route('admin.appointmentlist') }}";
                        document.location.href=url;
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

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 9.005401, lng: 38.763611},
                zoom: 12,
                minZoom: 1
            });

            setInterval(ajaxMapData, 3000);

            var legend = document.getElementById('legend');

            var div = document.createElement('div');
            div.innerHTML = '<img src="' + mapIcons['CAMEL_CARGO'] + '"> ' + 'Camel Cargo';
            legend.appendChild(div);

            var div = document.createElement('div');
            div.innerHTML = '<img src="' + mapIcons['VIP_RIDE'] + '"> ' + 'VIP Ride';
            legend.appendChild(div);

            var div = document.createElement('div');
            div.innerHTML = '<img src="' + mapIcons['CARE_CHAUFFEUR'] + '"> ' + 'Care Chauffeur';
            legend.appendChild(div);

            map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(legend);

            google.maps.Map.prototype.clearOverlays = function() {
                for (var i = 0; i < googleMarkers.length; i++ ) {
                    googleMarkers[i].setMap(null);
                }
                googleMarkers.length = 0;
            }

        }
    </script>
    <script src="//maps.googleapis.com/maps/api/js?key=AIzaSyBrCJsbCYfZOM4qbNaq9-rUVOsfn9mb6Gc&libraries=places&callback=initMap" async defer></script>
@endsection

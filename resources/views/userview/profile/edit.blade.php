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
   <div class="card">
      <div class="card-body">

         <form class="profileedit" action="#" method="post">
            <div class="row form-row">
               <div class="col-12 col-md-12">
                  <div class="form-group">
                     <div class="change-avatar">
                        <div class="profile-img" id="displaychange">
                           @if(!empty($profileData->profile))
                           <img src="{{asset($profileData->profile)}}" alt="User Image">
                           @else
                           <img src="{{asset('dummyimage/user.png')}}" alt="User Image">
                           @endif

                        </div>

                        <div class="upload-img">
                           <div class="change-photo-btn">
                              <span><i class="fa fa-upload"></i> Upload Photo</span>
                              <input type="file" class="upload" name="profile" id="editprofile">
                           </div>
                           <small class="form-text text-muted">Allowed JPG, GIF or PNG. Max size of 2MB</small>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" value="{{$profileData->name}}" name="name">
                  </div>
               </div>

               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>Date of Birth</label>
                     <div class="cal-icon">
                        <input type="date" class="form-control datetimepicker" value="{{$profileData->dob}}" name="dob">
                     </div>
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>Blood Group</label>
                     <select class="form-select form-control" name="blood_type">
                        <option {{$profileData->blood_type ==="A-"? 'selected':""}}>A-</option>
                        <option {{$profileData->blood_type ==="A+"? 'selected':""}}>A+</option>
                        <option {{$profileData->blood_type ==="B-"? 'selected':""}}>B-</option>
                        <option {{$profileData->blood_type ==="B+"? 'selected':""}}>B+</option>
                        <option {{$profileData->blood_type ==="AB-"? 'selected':""}}>AB-</option>
                        <option {{$profileData->blood_type ==="AB+"? 'selected':""}}>AB+</option>
                        <option {{$profileData->blood_type ==="O-"? 'selected':""}}>O-</option>
                        <option {{$profileData->blood_type ==="O+"? 'selected':""}}>O+</option>
                     </select>
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>Blood Group</label>
                     <select class="form-select form-control" name="gender">
                        <option {{$profileData->gender ==="male"? 'selected':""}}>MALE</option>
                        <option {{$profileData->gender ==="female"? 'selected':""}}>FEMALE</option>
                     </select>
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>Email ID</label>
                     <input type="email" class="form-control" value="{{$profileData->email}}" name="email">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>Mobile</label>
                     <input type="number" value="{{$profileData->phone}}" class="form-control" name="phone">
                  </div>
               </div>
               <div class="col-12">
                  <div class="form-group">
                     <label>Address Line 1</label>
                     <input class="form-control" rows="5" id="pac-input" name="address"
                        value="{{$profileData->address}}">
                     <div id="map">
                     </div>
                     <div id="infowindow-content">
                        <span id="place-name" class="title"></span><br />
                        <span id="place-address"></span>
                     </div>
                     <input name="lng" id="pac-role" type="hidden">
                     <input name="lat" id="pac-lan" type="hidden">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>City</label>
                     <input type="text" class="form-control" value="{{$profileData->city}}" name="city">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>State</label>
                     <input type="text" class="form-control" value="{{$profileData->state}}" name="state">
                  </div>
               </div>

               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>Country</label>
                     <input type="text" class="form-control" value="{{$profileData->country}}" name="country">
                  </div>
               </div>
               <div class="col-12 col-md-6">
                  <div class="form-group">
                     <label>No. of Family Member</label>
                     <input type="text" class="form-control" value="{{$profileData->family_size}}" name="family_size">
                  </div>
               </div>
            </div>
            <div class="submit-section">
               <button type="submit" class="btn btn-primary submit-btn">Save Changes</button>
            </div>
         </form>

      </div>
   </div>
</div>
</div>
</div>
</div>


@section('exrtajs')
<script
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6FjTNtaiuf3PGaAVvVFHYgc6M_tdM24k&callback=initMap&libraries=places&v=weekly"
   async></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
   $(function() {

$('.profileedit').submit(function(e){
    e.preventDefault();
    var fd = new FormData(this);



    fd.append('_token',"{{ csrf_token() }}");

    $.ajax({
         url: "{{ route('user.edit.data') }}",
    type: "post",
         data: fd,
         dataType: "JSON",
         processData: false,
    contentType: false,
    beforeSend: function () {
     //  $('.generalsets').prop('disabled', true);
      },
      success: function (result) {

        if(result.status===true){

         iziToast.success({
                     message: result.msg,
                     position: 'topRight'
                   });
                   setInterval( location.reload(), 10000);

        }
        else{
         iziToast.error({
                        message: result.msg,
                        position: 'topRight'
                    });

        }
        }
        })

        });
        $('#editprofile').on('change',function(e){
   let reader = new FileReader();
            reader.onload = (e) => {

                $('#displaychange').html('<img src="' + e.target.result + '" width="200px">');

            }
            reader.readAsDataURL(this.files[0]);
});





      });
</script>
<script>
   function initMap() {
   const map = new google.maps.Map(document.getElementById("map"), {
     center: { lat: 40.749933, lng: -73.98633 },
     zoom: 13,
     mapTypeControl: false,
   });
   const card = document.getElementById("pac-card");
   const input = document.getElementById("pac-input");
   const input1 = document.getElementById("pac-role");
   const biasInputElement = document.getElementById("use-location-bias");
   const strictBoundsInputElement = document.getElementById("use-strict-bounds");

   const options = {
     fields: ["formatted_address", "geometry", "name"],
     strictBounds: false,
     types: ["establishment"],
   };

   map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

   const autocomplete = new google.maps.places.Autocomplete(input, options);


   autocomplete.bindTo("bounds", map);

   const infowindow = new google.maps.InfoWindow();
   const infowindowContent = document.getElementById("infowindow-content");

   infowindow.setContent(infowindowContent);

   const marker = new google.maps.Marker({
     map,
     anchorPoint: new google.maps.Point(0, -29),
   });

   autocomplete.addListener("place_changed", () => {
     infowindow.close();
     marker.setVisible(false);

     const place = autocomplete.getPlace();

     if (!place.geometry || !place.geometry.location) {

       window.alert("No details available for input: '" + place.name + "'");
       return;
     }

     // If the place has a geometry, then present it on a map.
     if (place.geometry.viewport) {
       map.fitBounds(place.geometry.viewport);
     } else {
       map.setCenter(place.geometry.location);
       map.setZoom(17);
     }





      $('#pac-role').val(place.geometry.location.lng());
      $('#pac-lan').val(place.geometry.location.lat());

     marker.setPosition(place.geometry.location);
     marker.setVisible(true);
     infowindowContent.children["place-name"].textContent = place.name;
     infowindowContent.children["place-address"].textContent =
       place.formatted_address;
     infowindow.open(map, marker);
   });



 }
</script>

@endsection
@endsection
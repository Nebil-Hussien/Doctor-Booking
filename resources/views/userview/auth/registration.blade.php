<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Doccure-Dental</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">


   <link type="image/x-icon" href="{{asset('theme/img/favicon.png')}}" rel="icon">

   <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">

   <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome/css/fontawesome.min.css')}}">
   <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome/css/all.min.css')}}">

   <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
   <link rel="stylesheet" href="{{asset('assets/bundles/izitoast/css/iziToast.min.css')}}">

</head>

<body class="account-page">

   <div class="main-wrapper">

      <header class="header home">
        @include('web.include.navbar')
         <nav class="navbar navbar-expand-lg header-nav">
            <div class="navbar-header">
               <a id="mobile_btn" href="javascript:void(0);">
                  <span class="bar-icon">
                     <span></span>
                     <span></span>
                     <span></span>
                  </span>
               </a>
               <a href="{{url('/')}}" class="navbar-brand logo">
                  <img src="{{asset('theme/img/logo.png')}}" class="img-fluid" alt="Logo">
               </a>
            </div>
            <div class="main-menu-wrapper">
               <div class="menu-header">
                  <a href="{{url('/')}}" class="menu-logo">
                     <img src="{{asset('theme/img/logo.png')}}" class="img-fluid" alt="Logo">
                  </a>
                  <a id="menu_close" class="menu-close" href="javascript:void(0);">
                     <i class="fas fa-times"></i>
                  </a>
               </div>

            </div>
            <ul class="nav header-navbar-rht">
               <li class="nav-item">


                  <a class="nav-link header-login" href="{{route('login.show.user')}}">login </a>

               </li>
            </ul>
         </nav>
      </header>


      <div class="content">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-8 offset-md-2">

                  <div class="account-content">
                     <div class="row align-items-center justify-content-center">
                        <div class="col-md-7 col-lg-5 login-left">
                           <img src="{{asset('theme/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">
                        </div>
                        <div class="col-md-12 col-lg-7 login-right">
                           <div class="login-header">
                              <h3>Registration <span>User</span></h3>
                           </div>
                           <form action="#" method="post" class="registrationform">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group form-focus">
                                       <input type="text" class="form-control form-control-sm floating" name="name">
                                       <label class="focus-label">Name</label>
                                    </div>
                                    <div class="form-group form-focus">
                                       <input type="text" class="form-control floating" name="password">
                                       <label class="focus-label">Password</label>
                                    </div>

                                    <div class="form-group form-focus">
                                       <select class="form-select" name="gender">
                                          <option class="focus-label">Gender</option>
                                          <option value="male">Male</option>
                                          <option value="female">Female</option>

                                       </select>
                                       {{-- <label class="focus-label">gender</label> --}}
                                    </div>

                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group form-focus">
                                       <input type="email" class="form-control floating" name="email">
                                       <label class="focus-label">Email</label>
                                    </div>
                                    <div class="form-group form-focus">
                                       <input type="number" class="form-control floating" name="pnumber">
                                       <label class="focus-label">Phone No.</label>
                                    </div>
                                    <div class="form-group form-focus">
                                       <input type="number" class="form-control floating" name="fsize">
                                       <label class="focus-label">Family Size.</label>
                                    </div>



                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group form-focus">
                                       <label class="focus-label">Address</label>
                                       <input type="text" class="form-control floating" name="address" rows="4"
                                          id="pac-input">
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
                              </div>

                              <div class="text-end">
                                 <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Registration
                                 </button>
                              </div>
                              <div class="login-or">
                                 <span class="or-line"></span>
                                 <span class="span-or">or</span>
                              </div>
                              <div class="row form-row social-login">
                                 {{-- <div class="col-6">
                                    <a href="#" class="btn btn-facebook w-100"><i class="fab fa-facebook-f me-1"></i>
                                       Login</a>
                                 </div>
                                 <div class="col-6">
                                    <a href="#" class="btn btn-google w-100"><i class="fab fa-google me-1"></i>
                                       Login</a>
                                 </div> --}}
                              </div>
                              <div class="text-center dont-have">Don’t have an account? <a
                                    href="{{route('login.show.user')}}">Login</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>

               </div>
            </div>
         </div>
      </div>

       @include('web.include.footer')

   </div>

   <script src="{{asset('theme/js/jquery-3.6.0.min.js')}}"></script>

   <script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script>

   <script src="{{asset('theme/js/slick.js')}}"></script>

   <script src="{{asset('theme/js/script.js')}}"></script>
   <script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
   <script
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6FjTNtaiuf3PGaAVvVFHYgc6M_tdM24k&callback=initMap&libraries=places&v=weekly"
      async></script>
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
   <script>
      $(function() {

   $('.registrationform').submit(function(e){
       e.preventDefault();
       var fd = new FormData(this);
       fd.append('_token',"{{ csrf_token() }}");

       $.ajax({
            url: "{{ route('registration.data.user') }}",
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

            window.location.href = "{{route('login.show.user')}}";
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
         });
   </script>
</body>

<!-- Mirrored from doccure-html.dreamguystech.com/dental/login.html by HTTraQt Website Copier/1.x [Karbofos 2012-2017] Mon, 31 Jan 2022 06:50:27 GMT -->

</html>

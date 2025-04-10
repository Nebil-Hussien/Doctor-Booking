@extends('seniormd.layout.app')
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
   <form method="POST" action="#" class="profileedit">

      <div class="card contact-card">
         <div class="card-body">
            <h4 class="card-title">Contact Details</h4>
            <div class="row form-row">
               <div class="col-md-6">
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
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">State / Province</label>
                     <input type="text" class="form-control" name="state" value="{{$profileData->state}}">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">Country</label>
                     <input type="text" class="form-control" name="country" value="{{$profileData->country}}">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label class="control-label">city</label>
                     <input type="text" class="form-control" name="city" value="{{$profileData->city}}">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="submit-section submit-btn-bottom">
         <button type="submit" class="btn btn-primary submit-70">Save Changes</button>
      </div>
   </form>
</div>



@section('exrtajs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
   $(function() {

$('.profileedit').submit(function(e){
    e.preventDefault();
    var fd = new FormData(this);



    fd.append('_token',"{{ csrf_token() }}");

    $.ajax({
         url: "{{ route('seniorMdDocotr.edit.data.address') }}",
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




  var maxField = 5;


        var wrapperreps = $('.wrapper_contailer');

        var x = 1;
        $('.add_field').on('click' , function() {
         //  x = $(this).attr("data-count");
         alert('heo')
            if (x < maxField) {
                x++;
                var fieldHTMLreps = '<div class="row form-row remove_'+x+'"><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label>Degree</label><input type="text" class="form-control" name="degree[]" ></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label>College/Institute</label><input type="text" class="form-control" name="college[]" ></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label>Year of Completion</label><input type="date" class="form-control" name="year_of_completion[]"></div></div><a href="javascript:void(0);" class="remove_reps mx-2"><img src="{{asset("icons/remove-icon.png")}}"/></a></div>';

                $(wrapperreps).append(fieldHTMLreps);
                // $(wrapperreps).append(fieldHTMLreps);

            }
        });

        $(wrapperreps).on('click', '.remove_reps', function(e) {
            e.preventDefault();
            alert()
            $(this).parent('div').remove();
            x--;
        });


        $('.remove_button_reps').on('click', function() {

            var dataid = $(this).data('id');
            alert(dataid)
            $('.remove_' + dataid).remove();
        })

      });
</script>
<script
   src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6FjTNtaiuf3PGaAVvVFHYgc6M_tdM24k&callback=initMap&libraries=places&v=weekly"
   async></script>
<script src="{{asset('build/js/intlTelInput.js')}}"></script>
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
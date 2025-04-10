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
        <h4 class="card-title">Work Experience</h4>
        <a href=" {{route('mddoctor.profile.admin', base64_encode($experienceDetail->doctor_id))}} " class="btn btn-default pull-right"><i class="fa fa-angle-left"></i>Back</a>
        <form method="POST" action="#" class="profileedit">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Experience Detail</h4>
                    <div class="row form-row">
                        <input type="hidden" class="form-control" name="uniqueId" value="{{ $encriptedId }}">
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Employer</label>
                                <input type="text" class="form-control" name="employer_name" value="{{ $experienceDetail->employer_name }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Designation</label>
                                <input type="text" name="designation" class="form-control" value="{{ $experienceDetail->designation }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Year of Experience</label>
                                <input type="number" class="form-control" name="year_experience" value="{{ $experienceDetail->year_experience }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Reference Name</label>
                                <input type="text" class="form-control" name="reference_name" value="{{ $experienceDetail->guarantee_name }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label>Reference Phone</label>
                                <input type="tel" class="form-control" name="reference_phone" pattern="^\d{10}$" value="{{ $experienceDetail->guarantee_phone }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>From</label>
                                <input type="date" class="form-control" name="from" value="{{ $experienceDetail->from }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label>To</label>
                                <input type="date" class="form-control" name="to" value="{{ $experienceDetail->to }}" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="submit-section submit-btn-bottom">
                <button type="submit" class="btn btn-primary submit-100 ">Save Changes</button>
            </div>
        </form>
    </div>
</div>

@section('exrtajs')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA6FjTNtaiuf3PGaAVvVFHYgc6M_tdM24k&callback=initMap&libraries=places&v=weekly" async></script>
<script src="{{asset('build/js/intlTelInput.js')}}"></script>

<script>
    $(function() {

        $('#editprofile').on('change', function(e) {
            //alert('helo');
            let reader = new FileReader();
            reader.onload = (e) => {

                $('#displaychange').html('<img src="' + e.target.result + '" width="200px">');

            }
            reader.readAsDataURL(this.files[0]);
        });
        $('.profileedit').submit(function(e) {
            e.preventDefault();
            var fd = new FormData(this);



            fd.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('mddoctor.experience.update.register.admin') }}",
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
                        window.location.href = "/admin/mdprofile/" + result.doctor_id;
                    } else {
                        iziToast.error({
                            message: result.msg,
                            position: 'topRight'
                        });

                    }
                }
            })

        });
    });
    var input = document.querySelector("#phone");
    window.intlTelInput(input, {

        utilsScript: "build/js/utils.js",
    });

    function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: 40.749933,
                lng: -73.98633
            },
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

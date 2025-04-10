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

        <form method="POST" action="#" class="profileedit">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Basic Information</h4>
                    <a href="{{ route('user.list.admin') }}" class="btn btn-default pull-right"><i class="fa fa-angle-left"></i>Back</a>
                    <div class="row form-row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="change-avatar">
                                    <div class="profile-img" id="displaychange">

                                        <img src="{{asset('dummyimage/patient.png')}}" alt="User Image">

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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Phone Number</label>
                            <input type="number" class="form-control" name="phone" value="" required>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-select form-control" name="gender" required>
                                    <option>Select</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Age</label>
                            <input type="number" class="form-control" name="age" value="" required>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Blood Type</label>
                                <select class="form-select form-control" name="bloodType">
                                    <option>Select</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital Status</label>
                                <select class="form-select form-control" name="maritalStatus" required>
                                    <option>Select</option>
                                    <option>Single</option>
                                    <option>Married</option>
                                    <option>Divorced</option>
                                    <option>Widowed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Family Size</label>
                            <input type="number" class="form-control" name="familySize" value="" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Address Details</h4>
                    <div class="row form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address Line 1</label>
                                <input class="form-control" rows="5" id="pac-input" name="address" value="" required>
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
                                <input type="text" class="form-control" name="state" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Country</label>
                                <input type="text" class="form-control" name="country" value="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">city</label>
                                <input type="text" class="form-control" name="city" value="" required>
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
                url: "{{ route('patient.register.submit.admin') }}",
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

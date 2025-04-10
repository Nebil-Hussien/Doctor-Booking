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
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Basic Information</h4>
            <div class="row form-row">
               <div class="col-md-12">
                  <div class="form-group">
                     <div class="change-avatar">
                        <div class="profile-img" id="displaychange">
                           @if(!empty($profileData->profile))
                           <img src="{{asset($profileData->profile)}}" alt="User Image">
                           @else
                           <img src="{{asset('dummyimage/doctor.png')}}" alt="User Image">
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
               {{-- <div class="col-md-6">
               <div class="form-group">
                  <label>Username <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" readonly>
               </div>
            </div> --}}
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Email <span class="text-danger">*</span></label>
                     <input type="email" class="form-control" name="email" value="{{$profileData->email}}">
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                     <label>Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" name="name" value="{{$profileData->name}}">
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Phone Number</label>
                  <input type="number" class="form-control" name="phone" value="{{$profileData->phone}}">
               </div>

               <div class="col-md-6">
                  <div class="form-group">
                     <label>Gender</label>  
                     <select class="form-select form-control" name="gender">
                        <option>Select</option>
                        <option {{$profileData->gender ==="male"? 'selected':""}}>Male</option>
                        <option {{$profileData->gender ==="female"? 'selected':""}}>Female</option>
                     </select>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group mb-0">
                     <label>Date of Birth</label>
                     <input type="date" class="form-control" name="dob" value="{{$profileData->date_of_birth}}">
                  </div>
               </div>
            </div>
         </div>
      </div>


      <div class="card">
         <div class="card-body">
            <h4 class="card-title">About Me</h4>
            <div class="form-group mb-0">
               <label>Biography</label>
               <textarea class="form-control" rows="5" name="biography">{{$profileData->biography}}</textarea>
            </div>
         </div>
      </div>

      <div class="submit-section submit-btn-bottom">
         <button type="submit" class="btn btn-primary submit-100 ">Save Changes</button>
      </div>
</div>
</div>
</div>
</form>
</div>



@section('exrtajs')
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script>
   $(function() {

      $('.profileedit').submit(function(e) {
         e.preventDefault();
         var fd = new FormData(this);



         fd.append('_token', "{{ csrf_token() }}");

         $.ajax({
            url: "{{ route('seniorMdDocotr.edit.data.profile') }}",
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

      $('#editprofile').on('change', function(e) {
         let reader = new FileReader();
         reader.onload = (e) => {

            $('#displaychange').html('<img src="' + e.target.result + '" width="200px">');

         }
         reader.readAsDataURL(this.files[0]);
      });


      var maxField = 5;


      var wrapperreps = $('.wrapper_contailer');

      var x = 1;
      $('.add_field').on('click', function() {
         //  x = $(this).attr("data-count");
         alert('heo')
         if (x < maxField) {
            x++;
            var fieldHTMLreps = '<div class="row form-row remove_' + x + '"><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label>Degree</label><input type="text" class="form-control" name="degree[]" ></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label>College/Institute</label><input type="text" class="form-control" name="college[]" ></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label>Year of Completion</label><input type="date" class="form-control" name="year_of_completion[]"></div></div><a href="javascript:void(0);" class="remove_reps mx-2"><img src="{{asset("icons/remove-icon.png")}}"/></a></div>';

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
<script src="{{asset('build/js/intlTelInput.js')}}"></script>
<script>
   var input = document.querySelector("#phone");
   window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js",
   });
</script>
@endsection
@endsection
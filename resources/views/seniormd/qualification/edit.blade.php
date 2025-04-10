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
      <div class="card services-card">
         <div class="card-body">
            <h4 class="card-title"> Specialization</h4>
            <div class="form-group mb-0">
               <label>Specialization </label>
               <textarea class="input-tags form-control" type="text" placeholder="Enter Specialization" name="specialist">{{$profileData}}</textarea>
            </div>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Education</h4>
            <div class="education-info">
               <div class="row form-row education-cont">
                  <div class="col-12 col-md-10 col-lg-12">
                     <div class="row form-row">
                        @foreach($eductiondetail as $key =>$obj)
                        <div class="row form-row remove_{{$key}}">
                           <div class="col-12 col-md-6 col-lg-4">
                              <div class="form-group">
                                 <label>Degree</label>
                                 <input type="text" class="form-control" name="degree[]" value="{{$obj->degree}}">
                              </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-4">
                              <div class="form-group">
                                 <label>College/Institute</label>
                                 <input type="text" class="form-control" name="college[]" value="{{$obj->college}}">
                              </div>
                           </div>
                           <div class="col-12 col-md-6 col-lg-3 pr-0">
                              <div class="form-group">
                                 <label>Year of Completion</label>
                                 <input type="date" class="form-control" name="year_of_completion[]"
                                    value="{{$obj->year_of_completion}}">
                              </div>

                           </div>
                           <div class="col-12 col-md-6 col-lg-1 d-flex justify-content-center align-items-center">
                              <a href="javascript:void(0);" class="remove_button_reps mx-2" data-id="{{$key}}"><img
                                    src="{{asset("icons/remove-icon.png")}}" /></a>

                           </div>
                        </div>
                        @endforeach
                        <span class="wrapper_contailer"></span>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label>Degree</label>
                              <input type="text" class="form-control" name="degree[]">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label>College/Institute</label>
                              <input type="text" class="form-control" name="college[]">
                           </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-3">
                           <div class="form-group">
                              <label>Year of Completion</label>
                              <input type="date" class="form-control" name="year_of_completion[]">
                           </div>
                        </div>

                     </div>

                  </div>
               </div>
            </div>
            <div class="add-more">
               <a href="javascript:void(0);" class="add-education add_field"><i class="fa fa-plus-circle"></i> Add
                  More</a>
            </div>
         </div>
      </div>
      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Registration Details</h4>
            <div class="education-info">
               <div class="row form-row education-cont">
                  <div class="col-12 col-md-10 col-lg-12">
                     <div class="row form-row">
                        @foreach($registrationDetail as $key =>$obj)
                        <div class="row form-row remove_{{$key}}">
                           <div class="col-12 col-md-6 col-lg-4">
                              <div class="form-group">
                                 <label>Registration Sno</label>
                                 <input type="text" class="form-control" name="registration[]"
                                    value="{{$obj->registrationid}}">
                              </div>
                           </div>

                           <div class="col-12 col-md-6 col-lg-3 pr-0">
                              <div class="form-group">
                                 <label>Year of Completion</label>
                                 <input type="date" class="form-control" name="year_of_registration[]"
                                    value="{{$obj->year_of_registration}}">
                              </div>

                           </div>
                           <div class="col-12 col-md-6 col-lg-1 d-flex justify-content-center align-items-center">
                              <a href="javascript:void(0);" class="remove_button_reps mx-2" data-id="{{$key}}"><img
                                    src="{{asset("icons/remove-icon.png")}}" /></a>

                           </div>
                        </div>
                        @endforeach
                        <span class="registration_details"></span>
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label>Registration Sno</label>
                              <input type="text" class="form-control" name="registration[]">
                           </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 pr-0">
                           <div class="form-group">
                              <label>Year of Completion</label>
                              <input type="date" class="form-control" name="year_of_registration[]">
                           </div>

                        </div>

                     </div>

                  </div>
               </div>
            </div>
            <div class="add-more">
               <a href="javascript:void(0);" class="add-education add_field_registration"><i
                     class="fa fa-plus-circle"></i> Add
                  More</a>
            </div>
         </div>
      </div>



      <div class="submit-section submit-btn-bottom">
         <button type="submit" class="btn btn-primary  submit-100">Save Changes</button>
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
         url: "{{ route('seniorMdDocotr.edit.data.education') }}",
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

         // window.location.href = "{{route('md.dashboard')}}";
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



//education
        var maxField = 5;
        var x = 1;
        $('.add_field').on('click' , function() {
         //  x = $(this).attr("data-count");

            if (x < maxField) {
                x++;
                var fieldHTMLreps = '<div class="row form-row remove_'+x+'"><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label>Degree</label><input type="text" class="form-control" name="degree[]" ></div></div><div class="col-12 col-md-6 col-lg-4"><div class="form-group"><label>College/Institute</label><input type="text" class="form-control" name="college[]" ></div></div><div class="col-12 col-md-6 col-lg-3"><div class="form-group"><label>Year of Completion</label><input type="date" class="form-control" name="year_of_completion[]"></div></div> <div class="col-12 col-md-6 col-lg-1 d-flex justify-content-center align-items-center"><a href="javascript:void(0);" class="remove_button_reps mx-2" data-id="'+x+'"><img src="{{asset("icons/remove-icon.png")}}" /></a></div></div>';
                     $('.wrapper_contailer').append(fieldHTMLreps);

            }
        });
        $('body').on('click','.remove_button_reps', function() {

            var dataid = $(this).data('id');
            $('.remove_' + dataid).remove();
        })

        // registration add
        var maxFieldregis = 5;
        var y = 1;
        $('.add_field_registration').on('click' , function() {
         //  x = $(this).attr("data-count");

            if (y < maxField) {
                y++;
               var fieldHtmlRegistration = `     <div class="row form-row removeReg${y}"> <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label>Registration Sno</label>
                              <input type="text" class="form-control" name="registration[]">
                           </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 pr-0">
                           <div class="form-group">
                              <label>Year of Completion</label>
                              <input type="date" class="form-control" name="year_of_registration[]">
                           </div>

                        </div>
                        <div class="col-12 col-md-6 col-lg-1 d-flex justify-content-center align-items-center">
                              <a href="javascript:void(0);" class="remove_button_registration mx-2" data-id="${y}"><img
                                    src="{{asset("icons/remove-icon.png")}}" /></a>

                           </div>
                           </div>
               `;

                $('.registration_details').append(fieldHtmlRegistration);
                // $(wrapperreps).append(fieldHTMLreps);

            }
        });
        $('body').on('click','.remove_button_registration', function() {

            var dataid = $(this).data('id');

            $('.removeReg' + dataid).remove();
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
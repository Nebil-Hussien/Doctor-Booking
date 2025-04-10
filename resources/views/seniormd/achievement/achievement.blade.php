@extends('seniormd.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
<link rel="stylesheet" href="{{asset('build/css/intlTelInput.css')}}">
<link rel="stylesheet" href="{{asset('build/css/demo.css')}}">
<style>
   .fx_width {
      width: 150px;
      /* padding:5px */

   }
</style>
@endsection
@section('content')

<div class="col-md-7 col-lg-8 col-xl-9">
   <form method="POST" action="#" class="profileedit">

      <div class="card">
         <div class="card-body">
            <h4 class="card-title">Experience</h4>
            <div class="education-info">
               <div class="row form-row education-cont">
                  <div class="col-12 col-md-10 col-lg-12">
                     <div class="row form-row">
                        @foreach($expericanceDetail as $key =>$obj)
                        <div class="row form-row remove_{{$key}}">
                           <div class="col-11 d-flex justify-content-between flex-wrap ">

                              <div class="form-group fx_width">
                                 <label>Hospital Name</label>
                                 <input type="text" class="form-control" name="hospital_name[]"
                                    value="{{$obj->hospital_name}}" required>
                              </div>

                              <div class="form-group fx_width">
                                 <label>Designation</label>
                                 <input type="text" class="form-control" name="designation[]"
                                    value="{{$obj->designation}}" required>
                              </div>


                              <div class="form-group fx_width">
                                 <label>from</label>
                                 <input type="date" class="form-control" name="from[]" value="{{$obj->from}}" required>
                              </div>


                              <div class="form-group fx_width">
                                 <label>to</label>
                                 <input type="date" class="form-control" name="to[]" value="{{$obj->to}}" required>
                              </div>


                           </div>
                           <div class="col-1 text-center">
                              <div class="mt-4 pt-2">
                                 <a href="javascript:void(0);" class="remove_button_reps" data-id="{{$key}}"><img
                                       src="{{asset("icons/remove-icon.png")}}" /></a>
                              </div>

                           </div>
                        </div>
                        @endforeach
                        <span class="wrapper_contailer"></span>
                        @if(count($expericanceDetail) === 0)
                        <div class="col-11 d-flex justify-content-between flex-wrap ">

                           <div class="form-group fx_width">
                              <label>Hospital Name</label>
                              <input type="text" class="form-control hospita_name" name="hospital_name[]"
                                 id="hospita_name">
                           </div>

                           <div class="form-group fx_width">
                              <label>Designation</label>
                              <input type="text" class="form-control hospita_name" name="designation[]"
                                 id="hospital_destination">
                           </div>


                           <div class="form-group fx_width">
                              <label>from</label>
                              <input type="date" class="form-control hospita_name" name="from[]" id="hospita_from">
                           </div>


                           <div class="form-group fx_width">
                              <label>to</label>
                              <input type="date" class="form-control hospita_name" name="to[]" id="hospita_to">
                           </div>


                        </div>
                        @endif


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
            <h4 class="card-title">Award</h4>
            <div class="education-info">
               <div class="row form-row education-cont">
                  <div class="col-12 col-md-10 col-lg-12">
                     <div class="row form-row">
                        @foreach($awards as $key =>$obj)
                        <div class="row form-row removeyear_{{$key}}">
                           <div class="col-12 col-md-6 col-lg-3">
                              <div class="form-group">
                                 <label>Award Name</label>
                                 <input type="text" class="form-control" name="award_name[]"
                                    value="{{$obj->award_name}}" required>
                              </div>
                           </div>

                           <div class="col-12 col-md-6 col-lg-3 pr-0">
                              <div class="form-group">
                                 <label>Award Year</label>
                                 <input type="date" class="form-control" name="award_year[]"
                                    value="{{$obj->award_year}}" required>
                              </div>

                           </div>

                           <div class="col-12 col-md-6 col-lg-1 d-flex justify-content-center align-items-center">
                              <a href="javascript:void(0);" class="remove_button_year mx-2" data-id="{{$key}}"><img
                                    src="{{asset(" icons/remove-icon.png")}}" /></a>

                           </div>
                        </div>
                        @endforeach
                        <span class="registration_details"></span>
                        @if(count($awards) === 0)
                        <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label>Award Name</label>
                              <input type="text" class="form-control award_check" name="award_name[]">
                           </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 pr-0">
                           <div class="form-group">
                              <label>Award Year</label>
                              <input type="date" class="form-control" name="award_year[]" id="year">
                           </div>

                        </div>
                        @endif

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
         url: "{{ route('seniorMdDocotr.edit.data.achievement') }}",
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
                var fieldHTMLreps = ` <div class="row form-row remove_${x}">
                 <div class="col-11 d-flex justify-content-between flex-wrap ">

<div class="form-group fx_width">
   <label>Hospital Name</label>
   <input type="text" class="form-control" name="hospital_name[]"
   required >
</div>

<div class="form-group fx_width">
   <label>Designation</label>
   <input type="text" class="form-control" name="designation[]" required
     >
</div>


<div class="form-group fx_width">
   <label>from</label>
   <input type="date" class="form-control" name="from[]" required>
</div>


<div class="form-group fx_width">
   <label>to</label>
   <input type="date" class="form-control" name="to[]" required>
</div>


</div>
<div class="col-1 text-center">
<div class="mt-4 pt-2">
   <a href="javascript:void(0);" class="remove_button_reps" data-id="${x}"><img
         src="{{asset("icons/remove-icon.png")}}" /></a>
</div>



</div>


</div>`;
                     $('.wrapper_contailer').append(fieldHTMLreps);

            }
        });
        $('body').on('click','.remove_button_reps', function() {

            var dataid = $(this).data('id');
            alert(dataid);
            $('.remove_' + dataid).remove();
        })

        // registration add
        var maxFieldregis = 5;
        var y = 1;
        $('.add_field_registration').on('click' , function() {
         //  x = $(this).attr("data-count");

            if (y < maxField) {
                y++;
               var fieldHtmlRegistration = `     <div class="row form-row removeyear_${y}">
                  <div class="col-12 col-md-6 col-lg-4">
                           <div class="form-group">
                              <label>Award Name</label>
                              <input type="text" class="form-control" name="award_name[]" required >
                           </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-3 pr-0">
                           <div class="form-group">
                              <label>Award Year</label>
                              <input type="date" class="form-control" name="award_year[]" required >
                           </div>

                        </div>
                        <div class="col-12 col-md-6 col-lg-1 d-flex justify-content-center align-items-center">
                              <a href="javascript:void(0);" class="remove_button_year mx-2" data-id="${y}"><img
                                    src="{{asset("icons/remove-icon.png")}}" /></a>

                           </div>

                           </div>
               `;

                $('.registration_details').append(fieldHtmlRegistration);
                // $(wrapperreps).append(fieldHTMLreps);

            }
        });
        $('body').on('click','.remove_button_year', function() {

            var dataid = $(this).data('id');

            $('.removeyear_' + dataid).remove();
        })

      });
</script>

<script>
   $('.hospita_name').keyup(function(){

      $("#hospita_name").attr("required", "true");
      $("#hospital_destination").attr("required", "true");
      $("#hospita_to").attr("required", "true");
      $("#hospita_from").attr("required", "true");
   });
   $('.award_check').keyup(function(){
      $('#year').attr("required", "true");
   });
</script>
@endsection
@endsection
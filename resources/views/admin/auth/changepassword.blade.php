@extends('admin.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
<style>
   .centering_content {
      position: absolute;
      top: 50%;
      right: 50%;
      transform: translate(50%, -50%);
   }
</style>
@endsection
@section('content')

<div class="page-wrapper centering_content">

   <div class="content container-fluid ">

      <div class="row justify-content-center mt-5">
         <div class="col-6  ">

            <div class="card ">
               <div class="card-header">
                  <h4 class="card-title">Change Your Password</h4>
                  <p class="card-title">Enter Your New Password And Confirm Password</p>
               </div>
               <div class="card-body">
                  <form action="#" method="POST" class="changeForm" id="changeForm">
                     <div class="form-group mb-4">
                        <label>Old Password </label>
                        <input type="text" class="form-control" name="old_password">
                     </div>
                     <div class="form-group mb-4">
                        <label>New Password </label>
                        <input type="text" class="form-control" name="new_password">
                     </div>
                     <div class="form-group mb-4">
                        <label>Confirm Password </label>
                        <input type="text" class="form-control" name="confirm_password">
                     </div>
                     <div class="mt-3">
                        <button class="btn btn-primary w-100" type="submit">SUBMIT</button>
                     </div>
                  </form>
               </div>
            </div>

         </div>
      </div>
   </div>
</div>
@endsection
@section('exrtajs')
<script>
$(function() {

$('.changeForm').submit(function(e){
    e.preventDefault();
    var fd = new FormData(this);

    fd.append('_token',"{{ csrf_token() }}");

    $.ajax({
         url: "{{ route('changepassword.data') }}",
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
         //  window.location.href = "{{route('changepassword.show')}}";
         document.getElementById("changeForm").reset();
         // $(".changeForm").reset();
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
@endsection

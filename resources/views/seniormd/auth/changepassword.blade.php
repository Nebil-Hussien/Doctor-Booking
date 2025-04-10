@extends('seniormd.layout.app')
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

<div class="col-md-7 col-lg-8 col-xl-9">
   <div class="card">
      <div class="card-body">
         <div class="row">
            <div class="col-md-12 col-lg-6">

               <form class="changeForm" cation="#" method="POST">
                  <div class="form-group">
                     <label>Old Password</label>
                     <input type="password" class="form-control" name="old_password">
                  </div>
                  <div class="form-group">
                     <label>New Password</label>
                     <input type="password" class="form-control" name="new_password">
                  </div>
                  <div class="form-group">
                     <label>Confirm Password</label>
                     <input type="password" class="form-control" name="confirm_password">
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
         url: "{{ route('seniorMdDocotr.changepassword.data') }}",
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
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from doccure-html.dreamguystech.com/dental/admin/login.html by HTTraQt Website Copier/1.x [Karbofos 2012-2017] Mon, 31 Jan 2022 06:51:36 GMT -->

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
   <title>Doccure - Login</title>

   <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/favicon.png')}}">

   <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
   <link rel="stylesheet" href="{{asset('assets/bundles/izitoast/css/iziToast.min.css')}}">
   <!--[if lt IE 9]>

		<![endif]-->
</head>

<body>
   <!-- <div class="loader"></div> -->
   <div class="main-wrapper login-body">
      <div class="login-wrapper">
         <div class="container">
            <div class="loginbox">
               <div class="login-left">
                  <img class="img-fluid" src="{{asset('assets/img/logo-white.png')}}" alt="Logo">
               </div>
               <div class="login-right">
                  <div class="login-right-wrap">
                     <h1>Login</h1>
                     <p class="account-subtitle">Access to our admin dashboard</p>

                     <form class="loginForm" action="#" method="POST">
                        @CSRF
                        @csrf
                        <div class="form-group">
                           <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1"
                              placeholder="Username">
                        </div>
                        <div class="form-group">
                           <input type="password" name="password" class="form-control form-control-lg"
                              id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="mt-3">
                           <button class="btn btn-primary w-100" type="submit">Sign In</button>
                        </div>
                     </form>

                     <div class="text-center forgotpass"><a href="forgot-password.html">Forgot Password?</a></div>

                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>

   <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>

   <script src="{{asset('assets/js/script.js')}}"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>
   <script>
      $(function() {

                $('.loginForm').submit(function(e){
                    e.preventDefault();
                    var fd = new FormData(this);
                    fd.append('_token',"{{ csrf_token() }}");

                    $.ajax({
				          	url: "{{ route('login.data') }}",
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
                          window.location.href = "{{route('admin.dashboard')}}";
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


</html>

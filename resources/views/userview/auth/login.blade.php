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
                  <a class="nav-link header-login" href="{{route('registration.show.user')}}">Sign Up </a>
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
                        <div class="col-md-7 col-lg-6 login-left">
                           <img src="{{asset('theme/img/login-banner.png')}}" class="img-fluid" alt="Doccure Login">
                        </div>
                        <div class="col-md-12 col-lg-6 login-right">
                           <div class="login-header">
                              <h3>Login <span>Medical Doctor </span></h3>
                           </div>
                           <form action="#" method="post" class="loginform">
                              <div class="form-group form-focus">
                                 <input type="email" class="form-control floating" name="email">
                                 <label class="focus-label">Email</label>
                              </div>
                              <div class="form-group form-focus">
                                 <input type="password" class="form-control floating" name="password">
                                 <label class="focus-label">Password</label>
                              </div>
                              <div class="text-end">
                                 <a class="forgot-link" href="forgot-password.html">Forgot Password ?</a>
                              </div>
                              <button class="btn btn-primary w-100 btn-lg login-btn" type="submit">Login</button>
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
                                    href="{{route('registration.show.user')}}">Register</a>
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
   <script>
      $(function() {

   $('.loginform').submit(function(e){
       e.preventDefault();
       var fd = new FormData(this);


       fd.append('_token',"{{ csrf_token() }}");

       $.ajax({
            url: "{{ route('login.data.user') }}",
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

            window.location.href = "{{route('user.dashboard')}}";
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

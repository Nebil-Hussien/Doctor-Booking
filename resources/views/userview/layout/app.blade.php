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
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables/datatables.min.css')}}">
   @yield('exrtacss');
</head>

<body>

   <div class="main-wrapper">

      @include('userview.includes.navbar.navbar')

      <div class="breadcrumb-bar">
         <div class="container-fluid">
            <div class="row align-items-center">
               <div class="col-md-12 col-12">

                  <h2 class="breadcrumb-title">Dashboard</h2>
               </div>
            </div>
         </div>
      </div>
      <div class="content">
         <div class="container-fluid">
            <div class="row">
               @include('userview.includes.sidebar.sidebar')
               @yield('content')
            </div>
         </div>
      </div>
      @include('userview.includes.footer.footer')
   </div>


   <script src="{{asset('theme/js/jquery-3.6.0.min.js')}}"></script>

   <script src="{{asset('theme/js/bootstrap.bundle.min.js')}}"></script>

   <script src="{{asset('theme/js/slick.js')}}"></script>

   <script src="{{asset('theme/js/script.js')}}"></script>
   <script src="{{asset('assets/bundles/izitoast/js/iziToast.min.js')}}"></script>

   <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
   @yield('exrtajs')
</body>

</html>
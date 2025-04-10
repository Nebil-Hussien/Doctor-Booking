<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <title>Doccure-Dental</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

   <link type="image/x-icon" href="{{asset('theme/img/favicon.png')}}" rel="icon">

   <link rel="stylesheet" href="{{asset('theme/css/bootstrap.min.css')}}">

   <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
   <link rel="stylesheet" href="{{asset('theme/plugins/fontawesome/css/all.min.css')}}">

   <link rel="stylesheet" href="{{asset('theme/css/style.css')}}">
   <link rel="stylesheet" href="{{asset('assets/bundles/izitoast/css/iziToast.min.css')}}">
   <link rel="stylesheet" href="{{asset('assets/plugins/datatables/datatables.min.css')}}">
   <script src="https://kit.fontawesome.com/a076d05399.js"></script>
   <style>
      .coloset{
         color:#ffffff;
      }
      </style>



</head>

<body>

   <div class="main-wrapper">
       @include('web.include.navbar')
      @include('seniormd.includes.navbar.navbar')


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
               @include('seniormd.includes.sidebar.sidebar')
               @yield('content')
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

   <script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
   <script src="{{asset('assets/plugins/datatables/datatables.min.js')}}"></script>
   <script>
      $('.status_booking').on('click', function() {
         let status = $(this).attr('data-status');
         let id = $(this).attr('data-id')

         const fd = new FormData()
         fd.append('id', id);

         fd.append('status', status);
         fd.append('_token', '{{ csrf_token() }}');



         $.ajax({
               url: "{{ route('seniorMdDocotr.booking.status') }}",
               type: 'POST',
               data: fd,
               dataType: "JSON",
               contentType: false,
               processData: false,
               beforeSend: function() {

               },
            })
            .done(function(response) {

               if (response.status) {
                  $('.status_booking').removeClass(status === '1' ? 'btn-danger' : 'btn-success').addClass(status === '1' ? 'btn-success' : 'btn-danger').attr('data-status', status === '1' ? '0' : '1').html(status === '0' ? 'Booking Closed' : 'Booking Open');
                  iziToast.success({
                     message: response.msg,
                     position: 'topRight'
                  });
               } else {
                  iziToast.error({
                     message: response.msg,
                     position: 'topRight'
                  });
               }
            })
            .fail(function(jqXHR, exception) {
               console.log(jqXHR.responseText);
            })
      });
   </script>
   @yield('exrtajs');
</body>

</html>

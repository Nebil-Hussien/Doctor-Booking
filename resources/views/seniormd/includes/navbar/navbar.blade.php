<header class="header home">

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


            <button class=" status_booking  btn  btn-70  {{Auth()->guard('seniormd')->user()->is_online === 1 ? 'btn-outline-success' : 'btn-outline-warning'}}"  data-status="{{Auth()->guard('seniormd')->user()->is_online === 1 ? 0 : 1}}" data-id="{{Auth()->guard('seniormd')->id()}}">{{Auth()->guard('seniormd')->user()->is_online === 1 ? 'Booking Open' : 'Booking Closed'}}</button>


         </li>
      </ul>
   </nav>
</header>

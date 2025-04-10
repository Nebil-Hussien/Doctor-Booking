<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

   <div class="profile-sidebar">
      <div class="widget-profile pro-widget-content">
         <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">

               @if(!empty(Auth()->guard('mddoctor')->user()->profile))
               <img src="{{asset(Auth()->guard('mddoctor')->user()->profile)}}" alt="User Image">
               @else
               <img src="{{asset('dummyimage/doctor.png')}}" alt="User Image">
               @endif
            </a>
            <div class="profile-det-info">
               <h3>{{Auth()->guard('mddoctor')->user()->name}}</h3>
               <div class="patient-details">
                  <h5 class="mb-0">{{json_decode(Auth()->guard('mddoctor')->user()->specilization)}}</h5>
               </div>
            </div>
         </div>
      </div>
      <div class="dashboard-widget">
         <nav class="dashboard-menu">
            <ul>
               <li class="active">
                  <a href="{{route('md.dashboard')}}">
                     <i class="fas fa-columns"></i>
                     <span>Dashboard</span>
                  </a>
               </li>
               {{-- <li>
                  <a href="{{route('md.appointment.show')}}">
               <i class="fas fa-calendar-check"></i>
               <span>Appointments</span>
               </a>
               </li>


               <li>
                  <a href="invoices.html">
                     <i class="fas fa-file-invoice"></i>
                     <span>Invoices</span>
                  </a>
               </li>
               <li>
                  <a href="reviews.html">
                     <i class="fas fa-star"></i>
                     <span>Reviews</span>
                  </a>
               </li> --}}

               <li>
                  <a href="{{route('md.edit.show.profile')}}">
                     <i class="fas fa-user-cog"></i>
                     <span>Profile Settings</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('md.schedule.list')}}">
                     <i class="fas fa-hourglass-start"></i>
                     <span>Schedule Timings</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('md.edit.show.education')}}">
                     <i class="fas fa-graduation-cap"></i>
                     <span>Qualification</span>
                     <small class="unread-msg">23</small>
                  </a>
               </li>
               <li>
                  <a href="{{route('md.edit.show.address')}}">
                     <i class="fas fa-address-card"></i>
                     <span>Address</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('md.edit.show.achievement')}}">
                     <i class="fas fa-trophy"></i>
                     <span>Achievement</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('services.list.md')}}">
                     <i class="fas fa-trophy"></i>
                     <span>Services</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('md.doctor.appointment.list')}}">
                     <i class="fas fa-user-injured"></i>
                     <span>Doctor Appointment</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('md.appointmentlist')}}">
                     <i class="fas fa-trophy"></i>
                     <span>Appointment List</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('md.changepassword.show')}}">
                     <i class="fas fa-lock"></i>
                     <span>Change Password</span>
                  </a>
               </li>
               <li>

                  <a href="{{route('md.logout')}}">
                     <i class="fas fa-sign-out-alt"></i>
                     <span>Logout</span>
                  </a>
               </li>
            </ul>
         </nav>
      </div>
   </div>

</div>
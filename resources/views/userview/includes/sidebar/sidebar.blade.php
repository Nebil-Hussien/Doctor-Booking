<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

   <div class="profile-sidebar">
      <div class="widget-profile pro-widget-content">
         <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">

               @if(!empty(Auth()->guard('user')->user()->profile))
               <img src="{{asset(Auth()->guard('user')->user()->profile)}}" alt="User Image">
               @else
               <img src="{{asset('dummyimage/user.png')}}" alt="User Image">
               @endif
            </a>
            <div class="profile-det-info">
               <h3>{{Auth()->guard('user')->user()->name}}</h3>
               <div class="patient-details">

               </div>
            </div>
         </div>
      </div>
      <div class="dashboard-widget">
         <nav class="dashboard-menu">
            <ul>
               <li class="active">
                  <a href="{{route('user.dashboard')}}">
                     <i class="fas fa-columns"></i>
                     <span>Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('user.appointment.show')}}">
                     <i class="fas fa-calendar-check"></i>
                     <span>Appointments</span>
                  </a>
               </li>
               <li>
                  <a href="my-patients.html">
                     <i class="fas fa-user-injured"></i>
                     <span>My Patients</span>
                  </a>
               </li>
               <li>
                  <a href="schedule-timings.html">
                     <i class="fas fa-hourglass-start"></i>
                     <span>Schedule Timings</span>
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
               </li>
               <li>
                  <a href="chat-doctor.html">
                     <i class="fas fa-comments"></i>
                     <span>Message</span>
                     <small class="unread-msg">23</small>
                  </a>
               </li>
               <li>
                  <a href="{{route('user.edit.show')}}">
                     <i class="fas fa-user-cog"></i>
                     <span>Profile Settings</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('user.family.show')}}">
                     <i class="fas fa-share-alt"></i>
                     <span>Manage Family Details</span>
                  </a>
               </li>
               <li>
                  <a href="doctor-change-password.html">
                     <i class="fas fa-lock"></i>
                     <span>Change Password</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('user.logout')}}">
                     <i class="fas fa-sign-out-alt"></i>
                     <span>Logout</span>
                  </a>
               </li>
            </ul>
         </nav>
      </div>
   </div>

</div>
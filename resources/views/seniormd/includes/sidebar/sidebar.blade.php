<div class="col-md-5 col-lg-4 col-xl-3 theiaStickySidebar">

   <div class="profile-sidebar">
      <div class="widget-profile pro-widget-content">
         <div class="profile-info-widget">
            <a href="#" class="booking-doc-img">

               @if(!empty(Auth()->guard('seniormd')->user()->profile))
               <img src="{{asset(Auth()->guard('seniormd')->user()->profile)}}" alt="User Image">
               @else
               <img src="{{asset('dummyimage/doctor.png')}}" alt="User Image">
               @endif
            </a>
            <div class="profile-det-info">
               <h3>{{Auth()->guard('seniormd')->user()->name}}</h3>
               <div class="patient-details">
                  <h5 class="mb-0">BDS, MDS - Oral & Maxillofacial Surgery</h5>
               </div>
            </div>
         </div>
      </div>
      <div class="dashboard-widget">
         <nav class="dashboard-menu">
            <ul>
               <li class="active">
                  <a href="{{route('seniorMdDocotr.dashboard')}}">
                     <i class="fas fa-columns"></i>
                     <span>Dashboard</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('seniorMdDocotr.doctor.show')}}">
                     <i class="fas fa-calendar-check"></i>
                     <span>Approval List</span>
                  </a>
               </li>
               <!-- <li>
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
               </li>  -->

               <li>
                  <a href="{{route('seniorMdDocotr.edit.show.profile')}}">
                     <i class="fas fa-user-cog"></i>
                     <span>Profile Settings</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('seniorMdDocotr.edit.show.education')}}">
                     <i class="fas fa-graduation-cap"></i>
                     <span>Qualification</span>
                     <small class="unread-msg">23</small>
                  </a>
               </li>
               <li>
                  <a href="{{route('seniorMdDocotr.edit.show.address')}}">
                     <i class="fas fa-address-card"></i>
                     <span>Address</span>
                  </a>
               </li>
               <li>
                  <a href="{{route('seniorMdDocotr.edit.show.achievement')}}">
                     <i class="fas fa-trophy"></i>
                     <span>Achievement</span>
                  </a>
               </li>
               <li>

                  <a href="{{ route('seniorMdDocotr.changepassword.show') }}">
                     <i class="fas fa-lock"></i>
                     <span>Change Password</span>
                  </a>
               </li>
               <li>

                  <a href="{{route('seniorMdDocotr.logout')}}">
                     <i class="fas fa-sign-out-alt"></i>
                     <span>Logout</span>
                  </a>
               </li>
            </ul>
         </nav>
      </div>
   </div>

</div>
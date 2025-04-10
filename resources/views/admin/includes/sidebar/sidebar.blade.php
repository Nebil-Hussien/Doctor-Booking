<div class="sidebar" id="sidebar">
   <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
         <ul>
            <li class="menu-title">
               <span>Main</span>
            </li>
            <li class="{{$disbar == 'admin.dashboard'?'active':''}}">
               <a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
            </li>
            <li class="submenu" id="registration">
               <a href="#"><i class="fe fe-document"></i> <span>Register</span> <span class="menu-arrow"></span></a>
               <ul style="display: none;">
                  <li>
                     <a href="{{route('seniormddoctor.list.admin')}}" class="{{$disbar == 'registration.seniormddoctor'? 'active text-decoration-none' :''}}"><span>Senior Doctor</span></a>
                  </li>
                  <li>
                     <a href="{{route('mddoctor.list.admin')}}" class="{{$disbar == 'registration.mddoctor'? 'active text-decoration-none' :''}}"><span>Doctors</span></a>
                  </li>
                  <li>
                     <a href="{{route('user.list.admin')}}" class="{{$disbar == 'registration.user'? 'active text-decoration-none' :''}}"><span>Patients</span></a>
                  </li>
               </ul>
            </li>
            <li class="submenu" id="registration">
               <a href="#"><i class="fe fe-document"></i><span>Approve Register</span> <span class="menu-arrow"></span></a>
               <ul style="display: none;">
                  <li>
                     <a href="{{route('approval.seniormddoctor.list.admin')}}" class="{{$disbar == 'approval.seniormddoctor'? 'active text-decoration-none' :''}}"><span>Senior Doctor</span></a>
                  </li>
                  <li>
                     <a href="{{route('approval.mddoctor.list.admin')}}" class="{{$disbar == 'approval.mddoctor'? 'active text-decoration-none' :''}}"><span>Doctors</span></a>
                  </li>
                  <!-- <li>
                     <a href="{{route('approval.user.list.admin')}}"><span>Patients</span></a>
                  </li> -->
               </ul>
            </li>
            <li class="{{$disbar == 'role.admin'?'active':''}}">
               <a href="{{route('role.list.admin')}}"><i class="fe fe-home"></i> <span>Role Creation</span></a>
            </li>
            <li class="{{$disbar == 'report.admin'?'active':''}}">
                <a href="{{route('report.list.admin')}}"><i class="fe fe-home"></i> <span>Report</span></a>
             </li>

             <li class="{{$disbar == 'admin.service'?'active':''}}">
                <a href="{{route('admin.services_list')}}"><i class="fe fe-home"></i> <span>Services</span></a>
             </li>
             <li class="{{$disbar == 'admin.staff'?'active':''}}">
                <a href="{{route('admin.staff')}}"><i class="fe fe-home"></i> <span>Staff</span></a>
             </li>
             <li class="{{$disbar == 'admin.appointmentlist'?'active':''}}">
                <a href="{{route('admin.appointmentlist')}}"><i class="fe fe-home"></i> <span>Appointment List</span></a>
             </li>
         </ul>
      </div>
   </div>
</div>

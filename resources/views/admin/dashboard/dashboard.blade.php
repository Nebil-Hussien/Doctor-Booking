@extends('admin.layout.app')
@section('exrtacss')
<link rel="stylesheet" href="{{asset('css/dropify.min.css')}}">
<link rel="stylesheet" href="{{asset('css/upload.css')}}">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/jquery.dataTables.min.css">
@endsection
@section('content')
@section('pagename')
<a class="navbar-brand ml-5" style="color: #242423;" href="#">Items List</a>
@endsection
<div class="page-wrapper">
   <div class="content container-fluid">

      <div class="page-header">
         <div class="row">
            <div class="col-sm-12">
               <h3 class="page-title">Welcome Admin!</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item active">Dashboard</li>
               </ul>
            </div>
         </div>
      </div>

      <div class="row">
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="dash-widget-header">
                     <span class="dash-widget-icon text-primary border-primary">
                        <i class="fe fe-users"></i>
                     </span>
                     <div class="dash-count">
                        <h3>168</h3>
                     </div>
                  </div>
                  <div class="dash-widget-info">
                     <h6 class="text-muted">Doctors</h6>
                     <div class="progress progress-sm">
                        <div class="progress-bar bg-primary w-50"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="dash-widget-header">
                     <span class="dash-widget-icon text-success">
                        <i class="fe fe-credit-card"></i>
                     </span>
                     <div class="dash-count">
                        <h3>487</h3>
                     </div>
                  </div>
                  <div class="dash-widget-info">
                     <h6 class="text-muted">Patients</h6>
                     <div class="progress progress-sm">
                        <div class="progress-bar bg-success w-50"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="dash-widget-header">
                     <span class="dash-widget-icon text-danger border-danger">
                        <i class="fe fe-money"></i>
                     </span>
                     <div class="dash-count">
                        <h3>485</h3>
                     </div>
                  </div>
                  <div class="dash-widget-info">
                     <h6 class="text-muted">Appointment</h6>
                     <div class="progress progress-sm">
                        <div class="progress-bar bg-danger w-50"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
               <div class="card-body">
                  <div class="dash-widget-header">
                     <span class="dash-widget-icon text-warning border-warning">
                        <i class="fe fe-folder"></i>
                     </span>
                     <div class="dash-count">
                        <h3>$62523</h3>
                     </div>
                  </div>
                  <div class="dash-widget-info">
                     <h6 class="text-muted">Revenue</h6>
                     <div class="progress progress-sm">
                        <div class="progress-bar bg-warning w-50"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

   </div>
</div>

</div>

@endsection
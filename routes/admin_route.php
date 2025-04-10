<?php

use App\Http\Controllers\Admin\ApprovalController\MdDoctor\ApprovalMdController;
use App\Http\Controllers\Admin\ApprovalController\SeniorMdDoctor\ApprovalSeniorMdController;
use App\Http\Controllers\Admin\ApprovalController\UserDoctor\ApprovalUserController;
use App\Http\Controllers\Admin\Auth\AdminAuthController;
use App\Http\Controllers\Admin\MdDoctor\DoctorListController;
use App\Http\Controllers\Admin\RoleCreation\RoleCreationController;
use App\Http\Controllers\Admin\SeniorMdDoctor\SeniorDoctorListController;
use App\Http\Controllers\Admin\User\UserListController;
use App\Http\Controllers\Admin\PricingController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\Appointment\AdminAppointmentController;



use App\Http\Controllers\Admin\Service\AdminServiceController;
use App\Http\Controllers\SeniorMdDoctor\Page\DoctorList\DoctorListMdController;
use Illuminate\Support\Facades\Route;

/**
 * auth routes  of admin panel
 */
Route::get('login', [AdminAuthController::class, 'login'])->name('login.show');
Route::post('login/submit', [AdminAuthController::class, 'loginSubmit'])->name('login.data');

Route::middleware('admin_middleware')->group(function () {
   //dashboard routes  of admin panel
   Route::get('dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
   //logout routes  of admin panel
   Route::get('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
   //change password routes  of admin panel
   Route::get('changepassword', [AdminAuthController::class, 'changepassword'])->name('changepassword.show');
   //change password submit  routes  of admin panel
   Route::post('changepassword/submit', [AdminAuthController::class, 'changepasswordSubmit'])->name('changepassword.data');
   //registration panel


   //list of md

   Route::get('medicalDoctor', [DoctorListController::class, 'show'])->name('mddoctor.list.admin');
   Route::post('medicalDoctor/ajax', [DoctorListController::class, 'ajaxlist'])->name('mddoctor.ajax.admin');
   Route::get('mddoctor_access/{id}', [DoctorListController::class, 'mdpanelaccess'])->name('mddoctor.access.admin');
   Route::post('mddocotor/status', [DoctorListController::class, 'status'])->name('mddoctor.status.admin');
   Route::post('mddocotor/delete', [DoctorListController::class, 'delete'])->name('mddoctor.delete.admin');
   Route::get('mdprofile/{id}', [DoctorListController::class, 'profile'])->name('mddoctor.profile.admin');
   // Route::get('mdediacalDoctor/register', [DoctorListController::class, 'add'])->name('mddoctor.register.admin'); //use when required
   // Route::post('mdediacalDoctor/register/add', [DoctorListController::class, 'addSubmit'])->name('mddoctor.register.submit.admin');//use when required
   // //list of senior md
   Route::get('seniorMedicalDoctor', [SeniorDoctorListController::class, 'show'])->name('seniormddoctor.list.admin');
   Route::post('seniorMedicalDoctor/ajax', [SeniorDoctorListController::class, 'ajaxlist'])->name('seniormddoctor.ajax.admin');
   Route::get('seniormddoctor_access/{id}', [SeniorDoctorListController::class, 'seniormddoctorpanelaccess'])->name('seniormddoctor.access.admin');
   Route::post('seniormddocotor/status', [SeniorDoctorListController::class, 'status'])->name('seniormddoctor.status.admin');
   Route::post('seniormddocotor/delete', [SeniorDoctorListController::class, 'delete'])->name('seniormddoctor.delete.admin');
   Route::get('seniormdprofile/{id}', [SeniorDoctorListController::class, 'profile'])->name('seniormddoctor.profile.admin');

   //list of md
   Route::get('patient', [UserListController::class, 'show'])->name('user.list.admin');
   Route::post('patient/ajax', [UserListController::class, 'ajaxlist'])->name('user.ajax.admin');
   Route::get('user_access/{id}', [UserListController::class, 'userpanelaccess'])->name('user.access.admin');
   Route::post('user/status', [UserListController::class, 'status'])->name('user.status.admin');
   Route::post('user/delete', [UserListController::class, 'delete'])->name('user.delete.admin');

   // approval panel

   //list of md
   Route::get('approval/medicalDoctor', [ApprovalMdController::class, 'show'])->name('approval.mddoctor.list.admin');
   Route::post('approval/medicalDoctor/ajax', [ApprovalMdController::class, 'ajaxlist'])->name('approval.mddoctor.ajax.admin');
   Route::get('approval/mddoctor_access/{id}', [ApprovalMdController::class, 'mdpanelaccess'])->name('approval.mddoctor.access.admin');
   Route::post('approval/mddocotor/status', [ApprovalMdController::class, 'status'])->name('approval.mddoctor.status.admin');
   Route::post('approval/mddocotor/seniorms/status', [ApprovalMdController::class, 'doctorstatus'])->name('approval.mddoctor.status.seniormd.admin');
   Route::post('approval/mddocotor/delete', [ApprovalMdController::class, 'delete'])->name('approval.mddoctor.delete.admin');
   Route::get('approval/mdprofile/{id}', [ApprovalMdController::class, 'profile'])->name('approval.mddoctor.profile.admin');
   Route::post('approval/mdprofile/eduction/ajax', [ApprovalMdController::class, 'educationAjax'])->name('doctor.profile.eduction.admin');
   Route::post('approval/mdprofile/eduction/status', [ApprovalMdController::class, 'educationstatus'])->name('doctor.profile.eduction.status.admin');

   //list of senior md
   Route::get('approval/seniorMedicalDoctor', [ApprovalSeniorMdController::class, 'show'])->name('approval.seniormddoctor.list.admin');
   Route::post('approval/seniorMedicalDoctor/ajax', [ApprovalSeniorMdController::class, 'ajaxlist'])->name('approval.seniormddoctor.ajax.admin');
   Route::get('approval/seniormddoctor_access/{id}', [ApprovalSeniorMdController::class, 'seniormddoctorpanelaccess'])->name('approval.seniormddoctor.access.admin');
   Route::post('approval/seniormddocotor/status', [ApprovalSeniorMdController::class, 'status'])->name('approval.seniormddoctor.status.admin');
   Route::post('approval/seniormddocotor/delete', [ApprovalSeniorMdController::class, 'delete'])->name('approval.seniormddoctor.delete.admin');
   Route::get('approval/seniormdprofile/{id}', [ApprovalSeniorMdController::class, 'profile'])->name('approval.seniormddoctor.profile.admin');
   Route::post('approval/seniormdprofile/eduction/ajax', [ApprovalSeniorMdController::class, 'educationAjax'])->name('seniormddoctor.profile.eduction.admin');
   Route::post('approval/seniormdprofile/eduction/status', [ApprovalSeniorMdController::class, 'educationstatus'])->name('seniormddoctor.profile.eduction.status.admin');

   //list of md
   Route::get('approval/patient', [ApprovalUserController::class, 'show'])->name('approval.user.list.admin');
   Route::post('approval/patient/ajax', [ApprovalUserController::class, 'ajaxlist'])->name('approval.user.ajax.admin');
   Route::get('approval/user_access/{id}', [ApprovalUserController::class, 'userpanelaccess'])->name('approval.user.access.admin');
   Route::post('approval/user/status', [ApprovalUserController::class, 'status'])->name('approval.user.status.admin');
   Route::post('approval/user/delete', [ApprovalUserController::class, 'delete'])->name('approval.user.delete.admin');


   // role allocation related routes
   //role creation
   Route::get('role/list', [RoleCreationController::class, 'show'])->name('role.list.admin');
   Route::post('role/list/ajax', [RoleCreationController::class, 'ajaxlist'])->name('role.ajax.admin');
   Route::get('role/permission/{id}', [PermissionController::class, 'permission']);

//    Route::get('role/permission/{id}', function () {
//       $disbar = 'registration.mddoctor';
//       return view('admin.roleallocation.permission.permission', compact('disbar'));
//    });
   Route::post('role/list/status', [RoleCreationController::class, 'status'])->name('role.status.admin');
   Route::post('role/list/delete', [RoleCreationController::class, 'delete'])->name('role.delete.admin');
   Route::post('role/add', [RoleCreationController::class, 'add_role'])->name('admin.add_role');

   // Route for report
   Route::get('user/report', [UserListController::class, 'user_report'])->name('report.list.admin');
   Route::post('user/reports', [UserListController::class, 'user_report_list'])->name('report.ajax.admin');

   // Routes for Pricing
   // Route::get('pricing', [PricingController::class, 'pricing'])->name('admin.set.pricing');


   // Routes for services


//    Route for staff
Route::get('staff-list', [StaffController::class, 'staff_list'])->name('admin.staff');
Route::post('add-role', [StaffController::class, 'add_role'])->name('admin.add_role');
Route::post('staff-ajax-list', [StaffController::class, 'staff_ajax_list'])->name('admin.staff_ajax_list');
Route::post('staff-edit', [StaffController::class, 'edit_staff'])->name('admin.edit_staff');
Route::post('staff-delete', [StaffController::class, 'delete_staff'])->name('admin.staff.delete');

// Routes for permission  '

Route::post('add-permission', [PermissionController::class, 'add_permission'])->name('admin.add.permission');


   Route::get('service-list', [AdminServiceController::class, 'service_list'])->name('admin.services_list');
   Route::post('add-service', [AdminServiceController::class, 'add_service'])->name('admin.add_service');
   Route::post('ajax-list-service', [AdminServiceController::class, 'service_ajax_list'])->name('admin.service_ajax_list');
   Route::post('edit-service', [AdminServiceController::class, 'edit_service'])->name('admin.edit_service');
   Route::post('delete-service', [AdminServiceController::class, 'delete_service'])->name('admin.service.delete');
   Route::post('service-status', [AdminServiceController::class, 'status_service'])->name('admin.service.status');


//    Route for Appointment
Route::get('appointmentlist', [AdminAppointmentController::class, 'appointmentlist'])->name('admin.appointmentlist');
Route::post('appointmentlist-ajax', [AdminAppointmentController::class, 'appointmentlist_ajax'])->name('admin.appintmentlist');
Route::get('allocation/{id}', [AdminAppointmentController::class, 'appointmentlist_doctor_list']);


// Route for allocation
Route::post('appointmentlist-save', [AdminAppointmentController::class, 'doctorappointment'])->name('admin.doctorappointment');


});

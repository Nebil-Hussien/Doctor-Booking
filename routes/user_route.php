<?php

use App\Http\Controllers\User\Appointment\UserAppointmentController;
use App\Http\Controllers\User\Auth\UserAuthController;
use App\Http\Controllers\User\Family\UserFamilyController;
use App\Http\Controllers\User\Profile\UserprofileController;

use Illuminate\Support\Facades\Route;

/**
 * auth routes  of user panel
 */

Route::get('login', [UserAuthController::class, 'login'])->name('login.show.user');
Route::post('login/submit', [UserAuthController::class, 'loginSubmit'])->name('login.data.user');
Route::get('registration', [UserAuthController::class, 'registration'])->name('registration.show.user');
Route::post('registration/submit', [UserAuthController::class, 'registrationSubmit'])->name('registration.data.user');


Route::middleware('user_middleware')->group(function () {
   //    //dashboard routes  of user panel
   Route::get('dashboard', [UserAuthController::class, 'dashboard'])->name('user.dashboard');
   //    //logout routes  of user panel
   Route::get('logout', [UserAuthController::class, 'logout'])->name('user.logout');
   //    //change password routes  of user panel
   //    Route::get('changepassword', [UserAuthController::class, 'changepassword'])->name('changepassword.show');
   //    //change password submit  routes  of user panel
   //    Route::post('changepassword/submit', [UserAuthController::class, 'changepasswordSubmit'])->name('changepassword.data');
   Route::get('profile', [UserprofileController::class, 'edit'])->name('user.edit.show');
   Route::post('profile/submit', [UserprofileController::class, 'editSubmit'])->name('user.edit.data');
   //add family
   Route::get('family', [UserFamilyController::class, 'show'])->name('user.family.show');
   Route::post('family/ajax', [UserFamilyController::class, 'ajaxlist'])->name('user.family.ajax');
   Route::post('family/delete', [UserFamilyController::class, 'delete'])->name('user.family.delete');
   Route::get('family/add', [UserFamilyController::class, 'addshow'])->name('user.family.add.show');
   Route::post('familyadd/submit', [UserFamilyController::class, 'addsubmit'])->name('user.family.add.data');
   Route::get('family/edit/{id}', [UserFamilyController::class, 'editshow'])->name('user.family.edit.show');
   Route::post('familyedit/submit', [UserFamilyController::class, 'editsubmit'])->name('user.family.edit.data');

   //Appointment
   Route::get('appointment', [UserAppointmentController::class, 'appointmentIndex'])->name('user.appointment.show');
   Route::post('appointment/ajax', [UserAppointmentController::class, 'appointmentAjax'])->name('user.appointment.ajax');
   Route::post('appointment/status', [UserAppointmentController::class, 'appointmentStatus'])->name('user.appointment.status');
   Route::get('appointment/create', [UserAppointmentController::class, 'appointmentCreate'])->name('user.appointment.create.show');
   Route::post('appointment/create/data', [UserAppointmentController::class, 'appointmentCreateData'])->name('user.appointment.create.data');
});

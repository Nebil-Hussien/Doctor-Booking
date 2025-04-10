<?php

use App\Http\Controllers\Admin\ApprovalController\MdDoctor\ApprovalMdController;
use App\Http\Controllers\Mddoctor\Appointment\MdAppointmentController;
use App\Http\Controllers\Mddoctor\Auth\MdDoctorAuthController;
use App\Http\Controllers\Mddoctor\Education\MdEducationController;
use App\Http\Controllers\Mddoctor\Profile\ProfileController;
use App\Http\Controllers\Mddoctor\MdServiceController;
use App\Http\Controllers\Mddoctor\Sched\ScheduleController;
use App\Http\Controllers\Mddoctor\AppointmentController;
use App\Http\Controllers\Mddoctor\DoctorAppointment\DoctorAppointmentController;
use Illuminate\Support\Facades\Route;

/**
 * auth routes  of admin panel
 */

Route::get('login', [MdDoctorAuthController::class, 'login'])->name('login.show.mdDocotr');
Route::post('login/submit', [MdDoctorAuthController::class, 'loginSubmit'])->name('login.data.mdDocotr');
Route::get('registration', [MdDoctorAuthController::class, 'registration'])->name('registration.show.mdDocotr');
Route::post('registration/submit', [MdDoctorAuthController::class, 'registrationSubmit'])->name('registration.data.mdDocotr');

Route::middleware('mddoctor_middleware')->group(function () {
  //    //dashboard routes  of admin panel
  Route::get('dashboard', [MdDoctorAuthController::class, 'dashboard'])->name('md.dashboard');
  //    //logout routes  of admin panel
  Route::get('logout', [MdDoctorAuthController::class, 'logout'])->name('md.logout');
  //change password routes  of admin panel
  Route::get('changepassword', [MdDoctorAuthController::class, 'changepassword'])->name('md.changepassword.show');
  //    //change password submit  routes  of admin panel
  Route::post('changepassword/submit', [MdDoctorAuthController::class, 'changepasswordSubmit'])->name('md.changepassword.data');
  //edit profile of md
  Route::get('profile', [ProfileController::class, 'edit'])->name('md.edit.show.profile');
  Route::post('profile/submit', [ProfileController::class, 'editSubmit'])->name('md.edit.data.profile');
  //edit education
  Route::get('education', [MdEducationController::class, 'edit'])->name('md.edit.show.education');
  Route::post('education/submit', [MdEducationController::class, 'editSubmit'])->name('md.edit.data.education');
  //edit contact us
  Route::get('contact', [ProfileController::class, 'editAddress'])->name('md.edit.show.address');
  Route::post('contact/submit', [ProfileController::class, 'editAddressSubmit'])->name('md.edit.data.address');

  //edit achievement us
  Route::get('achievement', [MdEducationController::class, 'editAchievement'])->name('md.edit.show.achievement');
  Route::post('achievement/submit', [MdEducationController::class, 'editAchievementSubmit'])->name('md.edit.data.achievement');

  //booking status change
  Route::post('booking/status', [MdDoctorAuthController::class, 'booking'])->name('md.booking.status');

  // Route for doctor services
  Route::get('Md-service', [MdServiceController::class, 'md_service_list'])->name('services.list.md');
  Route::post('Md-service-assign', [MdServiceController::class, 'md_service_assigen'])->name('admin.mdservices.add');

  //Route for services
  Route::get('schedule', [ScheduleController::class, 'index'])->name('md.schedule.list');
  Route::post('add-schedule', [ScheduleController::class, 'add_schedule'])->name('mddoctor.add.schdule');
  Route::post('edit-schedule', [ScheduleController::class, 'edit_schedule'])->name('mddoctor.edit.schdule');
  Route::post('delete-schedule', [ScheduleController::class, 'delete_schedule'])->name('mddoctor.delete.schdule');

  // Appointment list Route

  Route::get('appointment-list', [MdAppointmentController::class, 'appointment'])->name('md.appointmentlist');
  Route::Post('appointment-list', [MdAppointmentController::class, 'appointment_list'])->name('md.appointment_ajax.list');
  Route::Post('appointment-status', [MdAppointmentController::class, 'appointment_status'])->name('md.appointment.status');

  //Doctor Appointment Accepted
  Route::get('doctor/appointment', [DoctorAppointmentController::class, 'doctoreAppointment'])->name('md.doctor.appointment.list');
  Route::post('doctor/appointment/ajax', [DoctorAppointmentController::class, 'doctorappointment_list'])->name('md.doctor.appointment.ajax');
  Route::get('doctor/appointment/session/{id}', [DoctorAppointmentController::class, 'sessionStart'])->name('md.appointment.session.start');
});

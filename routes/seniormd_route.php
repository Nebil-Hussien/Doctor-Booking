<?php


use App\Http\Controllers\SeniorMdDoctor\Auth\SeniorMdController;
use App\Http\Controllers\SeniorMdDoctor\Education\SeniorMdEducationController;
use App\Http\Controllers\SeniorMdDoctor\Page\DoctorList\DoctorListMdController;
use App\Http\Controllers\SeniorMdDoctor\Profile\ProfileSeniorMdController;
use Illuminate\Support\Facades\Route;

/**
 * auth routes  of admin panel
 */

Route::get('login', [SeniorMdController::class, 'login'])->name('login.show.seniorMdDocotr');
Route::post('login/submit', [SeniorMdController::class, 'loginSubmit'])->name('login.data.seniorMdDocotr');
Route::get('registration', [SeniorMdController::class, 'registration'])->name('registration.show.seniorMdDocotr');
Route::post('registration/submit', [SeniorMdController::class, 'registrationSubmit'])->name('registration.data.seniorMdDocotr');

Route::middleware('seniormddoctor_middleware')->group(function () {
   //    //dashboard routes  of admin panel
   Route::get('dashboard', [SeniorMdController::class, 'dashboard'])->name('seniorMdDocotr.dashboard');
   //    //logout routes  of admin panel
   Route::get('logout', [SeniorMdController::class, 'logout'])->name('seniorMdDocotr.logout');
   //change password routes  of admin panel
   Route::get('changepassword', [SeniorMdController::class, 'changepassword'])->name('seniorMdDocotr.changepassword.show');
   //change password submit  routes  of admin panel
   Route::post('changepassword/submit', [SeniorMdController::class, 'changepasswordSubmit'])->name('seniorMdDocotr.changepassword.data');
   Route::get('profile', [ProfileSeniorMdController::class, 'edit'])->name('seniorMdDocotr.edit.show.profile');
   Route::post('profile/submit', [ProfileSeniorMdController::class, 'editSubmit'])->name('seniorMdDocotr.edit.data.profile');
   //edit education
   Route::get('education', [SeniorMdEducationController::class, 'edit'])->name('seniorMdDocotr.edit.show.education');
   Route::post('education/submit', [SeniorMdEducationController::class, 'editSubmit'])->name('seniorMdDocotr.edit.data.education');
   //edit contact us
   Route::get('contact', [ProfileSeniorMdController::class, 'editAddress'])->name('seniorMdDocotr.edit.show.address');
   Route::post('contact/submit', [ProfileSeniorMdController::class, 'editAddressSubmit'])->name('seniorMdDocotr.edit.data.address');

   //edit achievement us
   Route::get('achievement', [SeniorMdEducationController::class, 'editAchievement'])->name('seniorMdDocotr.edit.show.achievement');
   Route::post('achievement/submit', [SeniorMdEducationController::class, 'editAchievementSubmit'])->name('seniorMdDocotr.edit.data.achievement');
   //booking status change
   Route::post('booking/status', [SeniorMdController::class, 'booking'])->name('seniorMdDocotr.booking.status');



   //list of md approval
   Route::get('doctor/list',[DoctorListMdController::class,'doctorList'])->name('seniorMdDocotr.doctor.show');
   Route::post('doctor/ajax',[DoctorListMdController::class,'doctorAjax'])->name('seniorMdDocotr.doctor.ajax');
   Route::post('doctor/status',[DoctorListMdController::class,'doctorstatus'])->name('seniorMdDoctor.doctor.status');
   Route::get('approval/mdprofile/{id}', [DoctorListMdController::class, 'profile'])->name('seniorMdDocotrmddoctor.profile');
   Route::post('approvael/mdprofile/eduction/ajax',[DoctorListMdController::class,'educationAjax'])->name('seniorMdDoctor.doctor.profile.eduction');
   Route::post('approvael/mdprofile/eduction/status',[DoctorListMdController::class,'educationstatus'])->name('seniorMdDoctor.doctor.profile.eduction.status');
});

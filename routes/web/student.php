<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\student\ExamFeeController;
use App\Http\Controllers\Backend\student\StudentController;
use App\Http\Controllers\Backend\student\StProfileController;
use App\Http\Controllers\Backend\student\MonthlyFeeController;
use App\Http\Controllers\Backend\student\StudentRoleController;
use App\Http\Controllers\Backend\student\RegistrationController;
use App\Http\Controllers\Backend\student\RegistrationFeeController;

Route::get('/reg/view', [RegistrationController::class, 'RegistrationView'])->name('student.registration.view');
Route::get('/reg/add', [RegistrationController::class, 'RegistrationAdd'])->name('student.registration.add');

Route::get('/reg/{student_id}', [RegistrationController::class, 'show'])->name('student.show');

Route::post('/reg/store', [RegistrationController::class, 'RegistrationStore'])->name('student.registration.store');

Route::get('/year/class/wise', [RegistrationController::class, 'ClassYearWise'])->name('student.year.class.wise');
Route::get('/reg/edit/{student_id}', [RegistrationController::class, 'RegistrationEdit'])->name('student.registration.edit');

Route::post('/reg/update/{student_id}', [RegistrationController::class, 'RegistrationUpdate'])->name('student.registration.update');
Route::get('/reg/promotion/{student_id}', [RegistrationController::class, 'RegistrationPromotion'])->name('student.registration.promotion');

Route::post('/reg/update/promotion/{student_id}', [RegistrationController::class, 'RegistrationUpdatePromotion'])->name('promotion.student.registration');
Route::get('/reg/details/{student_id}', [RegistrationController::class, 'RegistrationDetails'])->name('student.registration.details');

//Student Role Generate Routes
Route::get('/role/generate/view', [StudentRoleController::class, 'StudentRoleView'])->name('role.generate.view');
Route::get('/reg/getstudents', [StudentRoleController::class, 'GetStudents'])->name('student.registration.getstudents');

Route::post('/role/generate/store', [StudentRoleController::class, 'StudentRoleStore'])->name('role.generate.store');

//Student Registration Fee Routes
Route::get('/reg/fee/view', [RegistrationFeeController::class, 'RegFeeView'])->name('reg.fee.view');
Route::get('/reg/fee/classwisedata', [RegistrationFeeController::class, 'RegFeeClassWise'])->name('student.registration.fee.classwise.get');

Route::get('/reg/fee/payslip', [RegistrationFeeController::class, 'RegFeePayslip'])->name('student.registration.fee.payslip');

//Monthly Fee Routes
Route::get('/monthly/fee/view', [MonthlyFeeController::class, 'MonthlyFeeView'])->name('monthly.fee.view');
Route::get('/monthly/fee/classwisedata', [MonthlyFeeController::class, 'MonthlyFeeClassWise'])->name('student.monthly.fee.classwise.get');

Route::get('/monthly/fee/payslip', [MonthlyFeeController::class, 'MonthlyFeePayslip'])->name('student.monthly.fee.payslip');

//Exam Fee Routes
Route::get('/exam/fee/view', [ExamFeeController::class, 'ExamFeeView'])->name('exam.fee.view');
Route::get('/exam/fee/classwisedata', [ExamFeeController::class, 'ExamFeeClassWise'])->name('student.exam.fee.classwise.get');

Route::get('/exam/fee/payslip', [ExamFeeController::class, 'ExamFeePayslip'])->name('student.exam.fee.payslip');

//Student Routes
Route::get('/std/view', [StudentController::class, 'stdView'])->name('std.view');
Route::get('/std/add', [StudentController::class, 'stdAdd'])->name('std.add');

Route::post('/std/store', [StudentController::class, 'stdStore'])->name('std.store');
Route::get('/std/edit/{student_id}', [StudentController::class, 'stdEdit'])->name('std.edit');

Route::post('/std/update/{student_id}', [StudentController::class, 'stdUpdate'])->name('std.update');

//Student Profile Routes
Route::get('/std/{student_id}', [StProfileController::class, 'stPrView'])->name('std.profile');

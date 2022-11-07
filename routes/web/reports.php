<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Reports\ProfitController;
use App\Http\Controllers\Backend\Reports\MarksheetController;
use App\Http\Controllers\backend\reports\StudentIDController;
use App\Http\Controllers\backend\reports\ResultReportController;
use App\Http\Controllers\Backend\Reports\AttendanceReportController;

Route::get('monthly/profit/view', [ProfitController::class, 'MonthlyProfitView'])->name('monthly.profit.view');
Route::get('monthly/profit/datewise', [ProfitController::class, 'MonthlyProfitDateWise'])->name('reports.profit.datewise.get');

Route::get('monthly/profit/pdf', [ProfitController::class, 'MonthlyProfitPdf'])->name('reports.profit.pdf');

//Marksheet Generate Routes
Route::get('marksheet/generate/view', [MarksheetController::class, 'MarksheetView'])->name('marksheet.generate.view');
Route::get('marksheet/generate/get', [MarksheetController::class, 'MarksheetGet'])->name('reports.marksheet.get');

//Attendance Report Routes
Route::get('attendance/report/view', [AttendanceReportController::class, 'AttendanceView'])->name('attendance.report.view');
Route::get('attendance/report/get', [AttendanceReportController::class, 'AttendanceGet'])->name('reports.attendance.get');

//Student Results Report Routes
Route::get('student/result/view', [ResultReportController::class, 'ResultView'])->name('student.result.view');
Route::get('student/result/get', [ResultReportController::class, 'ResultGet'])->name('reports.student.result.get');

//Student ID Card Routes
Route::get('student/idcard/view', [StudentIDController::class, 'IdCardView'])->name('student.idcard.view');
Route::get('student/idcard/get', [StudentIDController::class, 'IdCardGet'])->name('reports.student.idcard.get');

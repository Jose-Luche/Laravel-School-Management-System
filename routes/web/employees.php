<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\employee\EmployeeRegController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;

Route::get('reg/employee/view', [EmployeeRegController::class, 'EmployeeView'])->name('employee.reg.view');
Route::get('reg/employee/add', [EmployeeRegController::class, 'EmployeeAdd'])->name('employee.reg.add');

Route::post('reg/employee/store', [EmployeeRegController::class, 'EmployeeStore'])->name('employee.reg.store');
Route::get('reg/employee/edit/{id}', [EmployeeRegController::class, 'EmployeeEdit'])->name('employee.reg.edit');

Route::post('reg/employee/update/{id}', [EmployeeRegController::class, 'EmployeeUpdate'])->name('employee.reg.update');
Route::get('reg/employee/details/{id}', [EmployeeRegController::class, 'EmployeeDetails'])->name('employee.reg.details');

// Employee Salary Routes
Route::get('salary/employee/view', [EmployeeSalaryController::class, 'SalaryView'])->name('employee.salary.view');
Route::get('salary/employee/increment/{id}', [EmployeeSalaryController::class, 'SalaryInc'])->name('employee.salary.increment');

Route::post('salary/employee/store/{id}', [EmployeeSalaryController::class, 'SalaryStore'])->name('update.increment.store');
Route::get('salary/employee/details/{id}', [EmployeeSalaryController::class, 'SalaryDetails'])->name('employee.salary.details');

//Employee Leave Routes
Route::get('leave/employee/view', [EmployeeLeaveController::class, 'LeaveView'])->name('employee.leave.view');
Route::get('leave/employee/add', [EmployeeLeaveController::class, 'LeaveAdd'])->name('employee.leave.add');

Route::post('leave/employee/store', [EmployeeLeaveController::class, 'LeaveStore'])->name('employee.leave.store');
Route::get('leave/employee/edit/{id}', [EmployeeLeaveController::class, 'LeaveEdit'])->name('employee.leave.edit');

Route::post('leave/employee/update/{id}', [EmployeeLeaveController::class, 'LeaveUpdate'])->name('employee.leave.update');
Route::get('leave/employee/delete/{id}', [EmployeeLeaveController::class, 'LeaveDelete'])->name('employee.leave.delete');

//Employee Attendance Routes
Route::get('attendance/employee/view', [EmployeeAttendanceController::class, 'AttendanceView'])->name('employee.attendance.view');
Route::get('attendance/employee/add', [EmployeeAttendanceController::class, 'AttendanceAdd'])->name('employee.attendance.add');

Route::post('attendance/employee/store', [EmployeeAttendanceController::class, 'AttendanceStore'])->name('employee.attendance.store');
Route::get('attendance/employee/edit/{date}', [EmployeeAttendanceController::class, 'AttendanceEdit'])->name('employee.attendance.edit');

Route::get('attendance/employee/details/{date}', [EmployeeAttendanceController::class, 'AttendanceDetails'])->name('employee.attendance.details');

//Employee Monthly Salary
Route::get('monthly/salary/view', [MonthlySalaryController::class, 'MonthlySalaryView'])->name('monthly.salary.view');
Route::get('monthly/salary/get', [MonthlySalaryController::class, 'MonthlySalaryGet'])->name('employee.monthly.salary.get');

Route::get('monthly/salary/payslip/{employee_id}', [MonthlySalaryController::class, 'MonthlySalaryPayslip'])->name('employee.monthly.salary.payslip');

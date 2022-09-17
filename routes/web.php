<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\marks\GradeController;
use App\Http\Controllers\Backend\marks\MarksController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Reports\ProfitController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Student\ExamFeeController;
use App\Http\Controllers\Backend\Reports\MarksheetController;
use App\Http\Controllers\Backend\Reports\StudentIDController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Account\OtherCostsController;
use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Student\MonthlyFeeController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\Student\StudentRoleController;
use App\Http\Controllers\Backend\employee\EmployeeRegController;
use App\Http\Controllers\Backend\Reports\ResultReportController;
use App\Http\Controllers\Backend\Student\RegistrationController;
use App\Http\Controllers\Backend\Account\AccountSalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\Employee\MonthlySalaryController;
use App\Http\Controllers\Backend\Employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\Student\RegistrationFeeController;
use App\Http\Controllers\Backend\Reports\AttendanceReportController;
use App\Http\Controllers\Backend\Employee\EmployeeAttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/admin/logout', [AdminController::class, 'Logout'])->name('admin.logout');

Route::group(['middleware' => 'auth'], function () {
    //User Management Routes

    Route::prefix('users')->group(function () {
        Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
        Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

        Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
        Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
        Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
        Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');
    });

    //User Profile routes

    Route::prefix('profile')->group(function () {
        Route::get('/view', [ProfileController::class, 'ProfileView'])->name('profile.view');
        Route::get('/edit', [ProfileController::class, 'ProfileEdit'])->name('profile.edit');

        Route::post('/store', [ProfileController::class, 'ProfileStore'])->name('profile.store');
        Route::get('/password/view', [ProfileController::class, 'PasswordView'])->name('password.view');
        Route::post('/password/update', [ProfileController::class, 'PasswordUpdate'])->name('password.update');
    });

    //Setup routes

    Route::prefix('setup')->group(function () {
        //Student Class Routes

        Route::get('/student/class/view', [StudentClassController::class, 'StudentView'])->name('student.class.view');
        Route::get('/student/class/add', [StudentClassController::class, 'StudentClassAdd'])->name('student.class.add');

        Route::post('/student/class/store', [StudentClassController::class, 'StudentClassStore'])->name('student.class.store');
        Route::get('student/class/edit/{id}', [StudentClassController::class, 'StudentClassEdit'])->name('student.class.edit');

        Route::post('/student/class/update/{id}', [StudentClassController::class, 'StudentClassUpdate'])->name('student.class.update');
        Route::get('/student/class/delete/{id}', [StudentClassController::class, 'StudentClassDelete'])->name('student.class.delete');

        //Student Year Routes
        Route::get('/student/year/view', [StudentYearController::class, 'StudentYearView'])->name('student.year.view');
        Route::get('/student/year/add', [StudentYearController::class, 'StudentYearAdd'])->name('student.year.add');

        Route::post('/student/year/store', [StudentYearController::class, 'StudentYearStore'])->name('student.year.store');
        Route::get('student/year/edit/{id}', [StudentYearController::class, 'StudentYearEdit'])->name('student.year.edit');

        Route::post('/student/year/update/{id}', [StudentYearController::class, 'StudentYearUpdate'])->name('student.year.update');
        Route::get('/student/year/delete/{id}', [StudentYearController::class, 'StudentYearDelete'])->name('student.year.delete');

        //Student Group Routes
        Route::get('/student/group/view', [StudentGroupController::class, 'StudentGroupView'])->name('student.group.view');
        Route::get('/student/group/add', [StudentGroupController::class, 'StudentGroupAdd'])->name('student.group.add');

        Route::post('/student/group/store', [StudentGroupController::class, 'StudentGroupStore'])->name('student.group.store');
        Route::get('student/group/edit/{id}', [StudentGroupController::class, 'StudentGroupEdit'])->name('student.group.edit');

        Route::post('/student/group/update/{id}', [StudentGroupController::class, 'StudentGroupUpdate'])->name('student.group.update');
        Route::get('/student/group/delete/{id}', [StudentGroupController::class, 'StudentGroupDelete'])->name('student.group.delete');

        //Student Shift Routes
        Route::get('/student/shift/view', [StudentShiftController::class, 'StudentShiftView'])->name('student.shift.view');
        Route::get('/student/shift/add', [StudentShiftController::class, 'StudentShiftAdd'])->name('student.shift.add');

        Route::post('/student/shift/store', [StudentShiftController::class, 'StudentShiftStore'])->name('student.shift.store');
        Route::get('student/shift/edit/{id}', [StudentShiftController::class, 'StudentShiftEdit'])->name('student.shift.edit');

        Route::post('/student/shift/update/{id}', [StudentShiftController::class, 'StudentShiftUpdate'])->name('student.shift.update');
        Route::get('/student/shift/delete/{id}', [StudentShiftController::class, 'StudentShiftDelete'])->name('student.shift.delete');


        //Fee Category Routes
        Route::get('/fee/category/view', [FeeCategoryController::class, 'FeeCategoryView'])->name('fee.category.view');
        Route::get('/fee/category/add', [FeeCategoryController::class, 'FeeCategoryAdd'])->name('fee.category.add');

        Route::post('/fee/category/store', [FeeCategoryController::class, 'FeeCategoryStore'])->name('fee.category.store');
        Route::get('fee/category/edit/{id}', [FeeCategoryController::class, 'FeeCategoryEdit'])->name('fee.category.edit');

        Route::post('/fee/category/update/{id}', [FeeCategoryController::class, 'FeeCategoryUpdate'])->name('fee.category.update');
        Route::get('/fee/category/delete/{id}', [FeeCategoryController::class, 'FeeCategoryDelete'])->name('fee.category.delete');

        //Fee Amount Routes
        Route::get('/fee/amount/view', [FeeAmountController::class, 'FeeAmountView'])->name('fee.amount.view');
        Route::get('/fee/amount/add', [FeeAmountController::class, 'FeeAmountAdd'])->name('fee.amount.add');

        Route::post('/fee/amount/store', [FeeAmountController::class, 'FeeAmountStore'])->name('fee.amount.store');
        Route::get('fee/amount/edit/{fee_category_id}', [FeeAmountController::class, 'FeeAmountEdit'])->name('fee.amount.edit');

        Route::post('/fee/amount/update/{fee_category_id}', [FeeAmountController::class, 'FeeAmountUpdate'])->name('fee.amount.update');
        Route::get('/fee/amount/details/{fee_category_id}', [FeeAmountController::class, 'FeeAmountDetails'])->name('fee.amount.details');

        //Exam type Routes
        Route::get('/exam/type/view', [ExamTypeController::class, 'ExamTypeView'])->name('exam.type.view');
        Route::get('/exam/type/add', [ExamTypeController::class, 'ExamTypeAdd'])->name('exam.type.add');

        Route::post('/exam/type/store', [ExamTypeController::class, 'ExamTypeStore'])->name('exam.type.store');
        Route::get('/exam/type/edit/{id}', [ExamTypeController::class, 'ExamTypeEdit'])->name('exam.type.edit');

        Route::post('/exam/type/update/{id}', [ExamTypeController::class, 'ExamTypeUpdate'])->name('exam.type.update');
        Route::get('/exam/type/delete/{id}', [ExamTypeController::class, 'ExamTypeDelete'])->name('exam.type.delete');

        //Subject Routes
        Route::get('/subject/view', [SubjectController::class, 'SubjectView'])->name('subject.view');
        Route::get('/subject/add', [SubjectController::class, 'SubjectAdd'])->name('subject.add');

        Route::post('/subject/store', [SubjectController::class, 'SubjectStore'])->name('subject.store');
        Route::get('/subject/edit/{id}', [SubjectController::class, 'SubjectEdit'])->name('subject.edit');

        Route::post('/subject/update/{id}', [SubjectController::class, 'SubjectUpdate'])->name('subject.update');
        Route::get('/subject/delete/{id}', [SubjectController::class, 'SubjectDelete'])->name('subject.delete');

        //Assign Subjects Routes
        Route::get('/assign/subject/view', [AssignSubjectController::class, 'AssignSubjectView'])->name('assign.subject.view');
        Route::get('/assign/subject/add', [AssignSubjectController::class, 'AssignSubjectAdd'])->name('assign.subject.add');

        Route::post('/assign/subject/store', [AssignSubjectController::class, 'AssignSubjectStore'])->name('assign.subject.store');
        Route::get('/assign/subject/edit/{student_class_id}', [AssignSubjectController::class, 'AssignSubjectEdit'])->name('assign.subject.edit');

        Route::post('/assign/subject/update/{student_class_id}', [AssignSubjectController::class, 'AssignSubjectUpdate'])->name('assign.subject.update');
        Route::get('/assign/subject/details/{student_class_id}', [AssignSubjectController::class, 'AssignSubjectDetails'])->name('assign.subject.details');

        //Designation Routes
        Route::get('/designation/view', [DesignationController::class, 'DesignationView'])->name('designation.view');
        Route::get('/designation/add', [DesignationController::class, 'DesignationAdd'])->name('designation.add');

        Route::post('/designation/store', [DesignationController::class, 'DesignationStore'])->name('designation.store');
        Route::get('/designation/edit/{id}', [DesignationController::class, 'DesignationEdit'])->name('designation.edit');

        Route::post('/designation/update/{id}', [DesignationController::class, 'DesignationUpdate'])->name('designation.update');
        Route::get('/designation/delete/{id}', [DesignationController::class, 'DesignationDelete'])->name('designation.delete');
    });

    //Student Registration routes

    Route::prefix('student')->group(function () {
        Route::get('/reg/view', [RegistrationController::class, 'RegistrationView'])->name('student.registration.view');
        Route::get('/reg/add', [RegistrationController::class, 'RegistrationAdd'])->name('student.registration.add');

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
    });

    //Employee Reg routes

    Route::prefix('employees')->group(function () {
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
    });

    //Marks Management Routes
    Route::prefix('marks')->group(function () {
        Route::get('marks/entry/add', [MarksController::class, 'MarksAdd'])->name('marks.entry.add');
        Route::post('marks/entry/store', [MarksController::class, 'MarksStore'])->name('marks.entry.store');

        Route::get('marks/entry/edit', [MarksController::class, 'MarksEdit'])->name('marks.entry.edit');
        Route::get('marks/edit/getstudents', [MarksController::class, 'MarksEditGet'])->name('marks.edit.getstudents');

        Route::post('marks/entry/update', [MarksController::class, 'MarksUpdate'])->name('marks.entry.update');

        //Grade Entry Routes
        Route::get('grade/view', [GradeController::class, 'GradeView'])->name('grade.view');
        Route::get('grade/add', [GradeController::class, 'GradeAdd'])->name('grade.add');

        Route::post('grade/store', [GradeController::class, 'GradeStore'])->name('grade.store');
        Route::get('grade/edit{id}', [GradeController::class, 'GradeEdit'])->name('grade.edit');

        Route::post('grade/update{id}', [GradeController::class, 'GradeUpdate'])->name('grade.update');
    });

    //Accounts Management Routes
    Route::prefix('accounts')->group(function () {
        Route::get('student/fee/view', [StudentFeeController::class, 'StudentFeeView'])->name('student.fee.view');
        Route::get('student/fee/add', [StudentFeeController::class, 'StudentFeeAdd'])->name('student.fee.add');

        Route::post('student/fee/store', [StudentFeeController::class, 'StudentFeeStore'])->name('student.fee.store');
        Route::get('student/fee/getstudent', [StudentFeeController::class, 'StudentFeeGetStudent'])->name('student.fee.getstudent');

        //Employee Salary Routes
        Route::get('account/salary/view', [AccountSalaryController::class, 'AccountSalaryView'])->name('account.salary.view');
        Route::get('account/salary/add', [AccountSalaryController::class, 'AccountSalaryAdd'])->name('account.salary.add');

        Route::get('account/salary/getemployee', [AccountSalaryController::class, 'GetEmployee'])->name('account.salary.getemployee');
        Route::post('account/salary/store', [AccountSalaryController::class, 'AccountSalaryStore'])->name('account.salary.store');

        //Other Costs Routes
        Route::get('other/costs/view', [OtherCostsController::class, 'OtherCostsView'])->name('other.costs.view');
        Route::get('other/costs/add', [OtherCostsController::class, 'OtherCostsAdd'])->name('other.costs.add');

        Route::post('other/costs/store', [OtherCostsController::class, 'OtherCostsStore'])->name('other.costs.store');
        Route::get('other/costs/edit{id}', [OtherCostsController::class, 'OtherCostsEdit'])->name('other.costs.edit');

        Route::post('other/costs/update{id}', [OtherCostsController::class, 'OtherCostsUpdate'])->name('other.costs.update');
    });

    //Report Routes
    Route::prefix('reports')->group(function () {
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
    });

    //Default Search Routes
    Route::get('marks/getsubject', [DefaultController::class, 'GetSubject'])->name('marks.getsubject');
    Route::get('student/marks/getstudents', [DefaultController::class, 'GetStudents'])->name('student.marks.getstudents');
});

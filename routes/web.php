<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DefaultController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\Marks\GradeController;
use App\Http\Controllers\Backend\Marks\MarksController;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Account\LedgerController;
use App\Http\Controllers\Backend\reports\ProfitController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\student\ExamFeeController;

use App\Http\Controllers\Backend\Account\ReceiptsController;



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
use App\Http\Controllers\Backend\student\MonthlyFeeController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;
use App\Http\Controllers\Backend\student\StudentRoleController;
use App\Http\Controllers\Backend\employee\EmployeeRegController;
use App\Http\Controllers\Backend\reports\ResultReportController;

use App\Http\Controllers\Backend\Student\RegistrationController;



use App\Http\Controllers\Backend\Account\AccountSalaryController;
use App\Http\Controllers\Backend\employee\EmployeeLeaveController;
use App\Http\Controllers\Backend\employee\MonthlySalaryController;
use App\Http\Controllers\Backend\employee\EmployeeSalaryController;
use App\Http\Controllers\Backend\student\RegistrationFeeController;
use App\Http\Controllers\Backend\reports\AttendanceReportController;
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

Route::prefix('users')->middleware('auth')->name('')->group(base_path('routes/web/user.php'));
Route::prefix('profile')->middleware('auth')->name('')->group(base_path('routes/web/profile.php'));
Route::prefix('setup')->middleware('auth')->name('')->group(base_path('routes/web/setup.php'));
Route::prefix('student')->middleware('auth')->name('')->group(base_path('routes/web/student.php'));
Route::prefix('employees')->middleware('auth')->name('')->group(base_path('routes/web/employees.php'));
Route::prefix('marks')->middleware('auth')->name('')->group(base_path('routes/web/marks.php'));
Route::prefix('accounts')->middleware('auth')->name('')->group(base_path('routes/web/accounts.php'));
Route::prefix('reports')->middleware('auth')->name('')->group(base_path('routes/web/reports.php'));
Route::prefix('prospect')->middleware('auth')->name('')->group(base_path('routes/web/prospects.php'));

Route::group(['middleware' => 'auth'], function () {


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

    //Excel Export Routes
    Route::get('/export-excel', [UserController::class, 'exportInExcel'])->name('users.excel');
    Route::get('/export-csv', [UserController::class, 'exportInCsv'])->name('users.csv');
});

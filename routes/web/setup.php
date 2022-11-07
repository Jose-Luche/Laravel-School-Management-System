<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Setup\SubjectController;
use App\Http\Controllers\Backend\Setup\ExamTypeController;
use App\Http\Controllers\Backend\Setup\FeeAmountController;
use App\Http\Controllers\Backend\Setup\DesignationController;
use App\Http\Controllers\Backend\Setup\FeeCategoryController;
use App\Http\Controllers\Backend\Setup\StudentYearController;
use App\Http\Controllers\Backend\Setup\StudentClassController;
use App\Http\Controllers\Backend\Setup\StudentGroupController;
use App\Http\Controllers\Backend\Setup\StudentShiftController;
use App\Http\Controllers\Backend\Setup\AssignSubjectController;


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

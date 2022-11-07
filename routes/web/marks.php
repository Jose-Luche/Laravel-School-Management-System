<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Marks\GradeController;
use App\Http\Controllers\Backend\Marks\MarksController;

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

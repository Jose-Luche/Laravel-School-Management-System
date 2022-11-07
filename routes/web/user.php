<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\UserController;

//User Routes

Route::get('/view', [UserController::class, 'UserView'])->name('user.view');
Route::get('/add', [UserController::class, 'UserAdd'])->name('users.add');

Route::post('/store', [UserController::class, 'UserStore'])->name('users.store');
Route::get('/edit/{id}', [UserController::class, 'UserEdit'])->name('users.edit');
Route::post('/update/{id}', [UserController::class, 'UserUpdate'])->name('users.update');
Route::get('/delete/{id}', [UserController::class, 'UserDelete'])->name('users.delete');

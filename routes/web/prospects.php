<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\student\ProspectController;
use App\Http\Controllers\Backend\student\PrProfileController;

Route::get('prospect/view', [ProspectController::class, 'ProsView'])->name('prospect.view');
Route::get('prospect/add', [ProspectController::class, 'ProsAdd'])->name('prospect.add');

Route::post('prospect/store', [ProspectController::class, 'PrStore'])->name('prospect.store');
Route::get('prospect/edit/{id}', [ProspectController::class, 'PrEdit'])->name('prospect.edit');

Route::post('prospect/update/{id}', [ProspectController::class, 'PrUpdate'])->name('prospect.update');
Route::get('prospect/delete/{id}', [ProspectController::class, 'PrDelete'])->name('prospect.delete');

//Prospect Profile Routes
Route::get('prospect/profile/view/{id}', [PrProfileController::class, 'prProfView'])->name('pr.profile.view');
Route::get('prospect/profile/edit/', [PrProfileController::class, 'prProfEdit'])->name('pr.profile.edit');

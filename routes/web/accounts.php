<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\Account\LedgerController;
use App\Http\Controllers\Backend\Account\ReceiptsController;
use App\Http\Controllers\Backend\Account\OtherCostsController;
use App\Http\Controllers\Backend\Account\StudentFeeController;
use App\Http\Controllers\Backend\Account\AccountSalaryController;

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

//Ledger Management Routes
Route::get('/ledger/view', [LedgerController::class, 'LedgerView'])->name('ledger.view');
Route::get('/ledger/add', [LedgerController::class, 'LedgerAdd'])->name('ledger.add');

Route::post('/ledger/store', [LedgerController::class, 'LedgerStore'])->name('ledger.store');

//Receipt Routes
Route::get('/receipt/view', [ReceiptsController::class, 'ReceiptView'])->name('receipt.view');
Route::get('/receipt/add', [ReceiptsController::class, 'ReceiptAdd'])->name('receipt.add');

Route::post('/receipt/store', [ReceiptsController::class, 'ReceiptStore'])->name('receipt.store');
Route::get('/fee/getmember', [ReceiptsController::class, 'GetMemberFee'])->name('get.member.fee');

Route::get('/make_payment/{id}', [ReceiptsController::class, 'billShow'])->name('make.payment');
Route::post('/make_payment/store/{id}', [ReceiptsController::class, 'PaymentStore'])->name('make.payment.store');

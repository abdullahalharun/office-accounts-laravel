<?php

use App\Http\Controllers\DepositController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use TCG\Voyager\Facades\Voyager;

Route::get('/login/google', function () {
    return Socialite::driver('google')->redirect();
});
Route::get('/login/google/callback', 'SocialiteController@handleGoogleCallback');

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('account', 'AccountController');
    Route::get('/expense/filter', [ExpenseController::class, 'filter_expense'])->name('expense.filter');
    Route::resource('expense', 'ExpenseController');
    Route::resource('expense-category', 'ExpensecategoryController');
    Route::get('expense-category/slug', 'ExpensecategoryController@slug')->name('expense-category.slug');
    Route::resource('salary', 'SalaryController');
    Route::get('salary/{id}/create-voucher', [SalaryController::class, 'create_voucher'])->name('salary.voucher');
    Route::resource('employee', 'EmployeeController');
    Route::resource('earning', 'EarningController');
    Route::resource('earning-category', 'EarningCategoryController');
    Route::resource('deposit', 'DepositController');
    Route::get('deposit/{id}/create-voucher', [DepositController::class, 'create_voucher'])->name('deposit.voucher');
    Route::resource('statement', 'StatementController');
    Route::resource('transfer', 'TransactionController');
    Route::get('expense/{id}/create-invoice', [ExpenseController::class, 'create_invoice'])->name('expense.invoice');
    Route::get('test', 'TestController@index');
    // Route::get('expense-category', [ExpensecategoryController::class, 'expense-category']);
    Route::get('/test', [TestController::class, 'index'])->name('test');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::resource('account', 'AccountController');
Route::resource('expense-category', 'ExpensecategoryController');
Route::resource('expense', 'ExpenseController');
Route::get('test', 'TestController@index');
// Route::get('expense-category', [ExpensecategoryController::class, 'expense-category']);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

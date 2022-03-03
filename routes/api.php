<?php

use App\Http\Controllers\api\EarningApiController;
use App\Http\Controllers\ExpenseController;
use App\Models\Earning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/expense', [ExpenseController::class, 'expenseApi']);

// Route::get('/earning', [EarningApiController::class, 'index']);
// Route::post('/earning', [EarningApiController::class, 'store']);

// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('earning', api\EarningApiController::class);
});

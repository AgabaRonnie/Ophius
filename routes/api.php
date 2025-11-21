<?php

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

//api_signin
//api_signup
Route::post('api_signin', [App\Http\Controllers\PersonController::class, 'api_signin']);
Route::post('api_signup', [App\Http\Controllers\PersonController::class, 'api_signup']);
Route::post('api_update_person', [App\Http\Controllers\PersonController::class, 'api_update_person']);

//business
Route::post('api_create_business', [App\Http\Controllers\BusinessController::class, 'api_create_business']);
Route::post('api_update_business', [App\Http\Controllers\BusinessController::class, 'api_update_business']);

//attendance
Route::post('api_create_attendance', [App\Http\Controllers\AttendanceController::class, 'api_create_attendance']);
Route::post('api_update_attendance', [App\Http\Controllers\AttendanceController::class, 'api_update_attendance']);
Route::post("api_get_attendances", [App\Http\Controllers\AttendanceController::class, 'api_get_attendances']);

//games
Route::post('api_create_game', [App\Http\Controllers\GameController::class, 'api_create_game']);
Route::post('api_get_games', [App\Http\Controllers\GameController::class, 'api_get_games']);

//machines
Route::post('api_create_machine', [App\Http\Controllers\MachineController::class, 'api_create_machine']);
Route::post('api_get_machines', [App\Http\Controllers\MachineController::class, 'api_get_machines']);

//sales
Route::post('api_create_sale', [App\Http\Controllers\SaleController::class, 'api_create_sale']);
Route::post('api_delete_sale', [App\Http\Controllers\SaleController::class, 'api_delete_sale']);
Route::post('api_get_sales', [App\Http\Controllers\SaleController::class, 'api_get_sales']);

//expenses
Route::post('api_create_expense', [App\Http\Controllers\ExpenseController::class, 'api_create_expense']);
Route::post('api_delete_expense', [App\Http\Controllers\ExpenseController::class, 'api_delete_expense']);
Route::post('api_get_expenses', [App\Http\Controllers\ExpenseController::class, 'api_get_expenses']);

Route::get("send_test_notification", [App\Http\Controllers\AppNotificationController::class, 'send_test_notification']);

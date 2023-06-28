<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/hello', function(){
    return response()->json(['message' => 'Hello, API!']);
});

// Employee Endpoints
Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees/{id}', [EmployeeController::class, 'show']);
Route::post('/employees', [EmployeeController::class, 'store']);
Route::put('/employees/{id}', [EmployeeController::class, 'update']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);

// Attendance Endpoints
Route::post('/attendance', [AttendanceController::class, 'store']);
Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);
Route::get('/attendance/{id}', [AttendanceController::class, 'show']);
Route::get('/attendance', [AttendanceController::class, 'index']);



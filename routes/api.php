<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\AuthController;
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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->post('/logout', [AuthenticationController::class, 'logout'])->name('logout');


Route::get('/hello', function(){
    return response()->json(['message' => 'Hello, API!']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    
    // Employee Endpoints
    Route::get('/employee', [EmployeeController::class, 'index']);
    Route::get('/employee/{id}', [EmployeeController::class, 'show']);
    Route::post('/employee', [EmployeeController::class, 'store']);
    Route::put('/employee/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employee/{id}', [EmployeeController::class, 'destroy']);
    Route::get('/employee/{id}/exists', [EmployeeController::class, 'exists']);

    // Attendance Endpoints
    Route::post('/attendance', [AttendanceController::class, 'store']);
    Route::delete('/attendance/{id}', [AttendanceController::class, 'destroy']);
    Route::get('/attendance/{id}', [AttendanceController::class, 'show']);
    Route::get('/attendance', [AttendanceController::class, 'index']);
    Route::get('/attendance/{id}/exists', [AttendanceController::class, 'exists']);
    
    // User endpoints
    Route::get('/users', [AuthController::class, 'allUsers']);
});
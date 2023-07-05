<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::post('/login', [AuthController::class, 'loginWeb']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/logout', [AuthController::class, 'logoutWeb'])->name('logout');

// Pages
Route::get('/dashboard', function(){
    // Only authenticated users can access this route
    return view('dashboard');
})->middleware('auth');
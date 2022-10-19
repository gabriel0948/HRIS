<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Auth::routes();

Route::group(['middleware' => 'prevent-back-history'], function () {


    Route::get('/', [LoginController::class, 'login'])->middleware('alreadyLoggedIn');

    Route::post('/logins', [LoginController::class, 'loginUser'])->name('login-user');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logouts');

    // ---- login -----
    Route::middleware('isLoggedIn')->group(function () {



        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        });

        // --------------- applying Leave ---------------
        Route::get('/apply-leave', [EmployeeController::class, 'index'])->name('search_emp');
        Route::get('/calendar-leave', [EmployeeController::class, 'calendarLeave'])->name('calendar-leave');
        Route::post('/store-Leave', [EmployeeController::class, 'store'])->name('leaveStore');
    });
}); 
// middleware prevent back

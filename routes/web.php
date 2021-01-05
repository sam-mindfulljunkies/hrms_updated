<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;

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

Route::get('/', [LoginController::class, 'index'])->name('home');
Route::post('/login', [LoginController::class, 'check_auth'])->name('login');

Route::group(['middleware' => 'admin'],function(){
    Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
    Route::get('/logout', [LoginController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/reports', [ReportController::class, 'index'])->name('reports');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/reports/users/{date}', [ReportController::class, 'getuserReport'])->name('user_reports');
    Route::get('/reports/users/{id}', [ReportController::class, 'getuserDetailedReportById'])->name('users.details.report');
});

Route::middleware(['employee'])->group(function () {
    Route::get('/logout-employee', [LoginController::class, 'employee_logout'])->name('employee.logout');
});


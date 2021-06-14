<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\ReportController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\NotificationController;

use App\Http\Controllers\LeaveController;



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



    /**Report Controller */

    Route::get('/reports', [ReportController::class, 'index'])->name('reports');

    Route::post('/reports/users/{date}', [ReportController::class, 'getuserReport'])->name('user_reports');

    Route::get('/reports/users/{id}', [ReportController::class, 'getuserDetailedReportById'])->name('users.details.report');

    Route::get('/reports/{id}', [ReportController::class, 'getUserReportByuserId'])->name('reports.users');

    Route::get('/report/add/form/', [ReportController::class, 'formadd_report'])->name('reports.addforms');

    Route::post('/report/submit_report/', [ReportController::class, 'submit_report'])->name('submit_report');





    /**User Controller */

    Route::get('/users/add_form/', [UserController::class, 'add_form'])->name('user.add_form');

    Route::get('/users', [UserController::class, 'index'])->name('users');

    Route::post('/users/submit_user', [UserController::class, 'submit_user'])->name('submit_user');

    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('edit_user');

    Route::post('/users/update/', [UserController::class, 'update'])->name('update_user');

    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('delete_user');

    Route::get('/users/delete/{id}', [UserController::class, 'delete'])->name('delete_user');

    Route::get('/myprofile', [UserController::class, 'user_profile'])->name('user_profile');


    /**Notification Controller */

    Route::get('/notifications', [NotificationController::class, 'add_form'])->name('notification.add_form');

    Route::get('/notifications/list', [NotificationController::class, 'lisiting_admin'])->name('notification.list');

    Route::get('/notifications/user/{id}', [NotificationController::class, 'listing'])->name('notification.users');

    Route::post('/notifications/submit', [NotificationController::class, 'submit_notification'])->name('submit_notification');
    Route::get('/notification/hide/{id}', [NotificationController::class, 'hide'])->name('dismiss');



    /** Leave management */

    Route::get('/leaves', [LeaveController::class, 'index'])->name('leave.users');

    Route::get('/leaves/add', [LeaveController::class, 'add_form'])->name('leave.add_form');

    Route::post('/leave/submit', [LeaveController::class, 'submit_leave'])->name('submit_leave');

    Route::get('/leave/cancle/{id}', [LeaveController::class, 'cancel'])->name('leave.cancel');

    /** ajax route**/

    Route::post('/leaves/leave_sub_type/{id}', [LeaveController::class, 'leave_sub_type'])->name('leave.leave_sub_type');

    /**admin**/
    Route::get('/leave/approve/{id}', [LeaveController::class, 'approve'])->name('leave.approved');
    Route::get('/leave/reject/{id}', [LeaveController::class, 'reject'])->name('leave.reject');
    Route::get('/leaves/admin_listing',[LeaveController::class, 'listing_Admin'])->name('listing.leave');


});

Route::get('/clear-cache', function() {
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    \Artisan::call('optimize:clear');
    return 'DONE'; //Return anything
});

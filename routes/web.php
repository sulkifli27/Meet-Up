<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MeetupController;
use App\Http\Controllers\Admin\DetailMeetingController;


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

Route::group(['middleware' => ['auth']], function () {

    // dashboard
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
    Route::get('/', [DashboardController::class, 'index'])->name('home');

    // users
    Route::resource('users', UserController::class);

    // room meetup
    Route::resource('meetups', MeetupController::class);

    // detail meeting
    Route::resource('detail-meeting', DetailMeetingController::class);
    Route::get('all-meeting', [DetailMeetingController::class, 'allMeeting'])->name('all-meeting');
});

// user
Route::get('users-create', [UserController::class, 'create'])->name('create-user');
Route::post('users-store', [UserController::class, 'store'])->name('store-user');


Auth::routes();

Route::match(["GET", "POST"], '/register', function () {
    return redirect('/login');
})->name('register');

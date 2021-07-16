<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\MeetupController;
use App\Http\Controllers\Api\DetailMeetingController;


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

// users
Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'create']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

// meetup
Route::get('meetups', [MeetupController::class, 'index']);
Route::get('meetups/{id}', [MeetupController::class, 'show']);
Route::post('meetups', [MeetupController::class, 'create']);
Route::put('meetups/{id}', [MeetupController::class, 'update']);
Route::delete('meetups/{id}', [MeetupController::class, 'destroy']);

// detail Meeting
Route::get('meeting', [DetailMeetingController::class, 'index']);
Route::get('meeting/{id}', [DetailMeetingController::class, 'show']);
Route::post('meeting', [DetailMeetingController::class, 'create']);
Route::delete('meeting/{id}', [DetailMeetingController::class, 'destroy']);
Route::put('meeting/{id}', [DetailMeetingController::class, 'update']);

<?php

use App\Http\Controllers\Apps\Dashboard\BookedRoomController;
use App\Http\Controllers\Apps\Dashboard\ManageRoomController;
use App\Http\Controllers\Apps\Dashboard\DashboardController;
use App\Http\Controllers\Apps\BookingController;
use App\Http\Controllers\Apps\HomeController;
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

Route::get('/', HomeController::class)->name('home');
Route::resource('/booking-room', BookingController::class);

Route::prefix('admin')->group(function() {
  Route::group(['middleware' => ['auth']], function () {
    Route::resource('dashboard', DashboardController::class, ['as' => 'admin']);
    Route::resource('manage-room', ManageRoomController::class, ['as' => 'admin']);
    Route::get('booked-room', BookedRoomController::class)->name('admin.booked-room');
  });
});


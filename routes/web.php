<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Models\UserProfile;
use App\Models\Booking;
use App\Models\Car;
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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $totalUserProfile = UserProfile::count();
        $totalCar = Car::count();
        $countStatusOneBookings = Booking::where('status', 1)->count();
        $countStatusTreeBookings = Booking::where('status', 3)->count();

        return view('dashboard', compact('totalUserProfile','totalCar','countStatusOneBookings','countStatusTreeBookings'));
    })->name('dashboard');


    Route::get('/users', [UserProfileController::class, 'index'])->name('index_users');


    Route::get('/staff', [StaffController::class, 'index'])->name('index_staff');
    Route::post('/staff/add', [StaffController::class, 'create'])->name('staff_add');
    Route::post('staff/update/{id}', [StaffController::class, 'update']);
    Route::get('/staff/delete/{id}', [StaffController::class, 'delete']);



    Route::get('/car', [CarController::class, 'index'])->name('index_car');
    Route::post('/car/add', [CarController::class, 'create'])->name('car_add');
    Route::post('car/update/{id}', [CarController::class, 'update']);
    Route::get('/car/delete/{id}', [CarController::class, 'delete']);


    Route::get('/bookings', [BookingController::class, 'index'])->name('index_bookings');
    Route::get('/bookings_history', [BookingController::class, 'index2'])->name('index_bookings_history');
    Route::post('/bookings/add', [BookingController::class, 'create'])->name('bookings_add');
    Route::post('/bookings/update/{id}', [BookingController::class, 'update']);
    Route::get('/bookings/delete/{id}', [BookingController::class, 'delete']);

    Route::get('/getback', [BookingController::class, 'getback'])->name('index_getback');

    Route::get('/profile', [ProfileController::class, 'index'])->name('index_profile');


});

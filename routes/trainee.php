<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Trainee\HomeController;

/*
|--------------------------------------------------------------------------
| Trainee Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(["middleware" => ["auth"]], function () {
//    Route::get('/trainee/dashboard', [HomeController::class, 'index'])->name('trainee_index');
    Route::get('/trainers', [HomeController::class, 'getTrainers'])->name('trainer');
    Route::post('/trainermsg', [HomeController::class, 'trainermsg'])->name('trainermsg');
    Route::get('/trainers/search', [HomeController::class, 'trainerSearch'])->name('trainerSearch');
    Route::get('/trainers/search/dashbaord', [HomeController::class, 'trainerSearchDashboard'])->name('trainerSearchDashboard');

    Route::get('/upcoming-session', [HomeController::class, 'upcomingSession'])->name('upcoming_session1');
    Route::get('/previous-session', [HomeController::class, 'previousSession'])->name('previous_session1');
    Route::get('/payment-info', [HomeController::class, 'paymentInfo'])->name('payment_info');
    Route::post('/payment/cstore', [HomeController::class, 'cstore'])->name('cstore');

    Route::get('/profile', [HomeController::class, 'traineeProfile'])->name('trainee_profile');
    Route::post('/profile/update', [HomeController::class, 'profileUpdate'])->name('profileUpdate');
    Route::post('/image/update', [HomeController::class, 'profileImageUpdate'])->name('profileImageUpdate');
    Route::get('/trainers-profile/{id}', [HomeController::class, 'trainerProfile'])->name('trainer_profile');

    Route::get('/appointment/{id}', [HomeController::class, 'appointment'])->name('appointment');
//    Route::get('/appointment_cancel/{id}', [HomeController::class, 'appointment_cancel'])->name('appointment_cancel');

    Route::get('/trineelogout', [HomeController::class, 'logout'])->name('trineelogout');
    Route::post('/bookappointment', [HomeController::class, 'bookAppointment'])->name('bookappointment');
    Route::post('/bookappointmentWithStripe', [HomeController::class, 'bookAppointmentWithStripe'])->name('bookappointmentWithStripe');

    Route::post('/passwordUpdate', [HomeController::class, 'passwordUpdate'])->name('passwordUpdate');
    Route::post('/review/posted', [HomeController::class, 'reviewPosted'])->name('reviewPosted');

    Route::post('/getTrainerSessionTimings', [HomeController::class, 'getSessionTimings'])->name('getTrainerSessionTimings');
    Route::post('/get-price-by-location', [HomeController::class, 'getPriceBbyLocation'])->name('get-price-by-location');
  
});


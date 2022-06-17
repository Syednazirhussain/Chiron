<?php

use App\Http\Controllers\Trainer\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Trainer Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group([], function () {

    Route::get('/dashboard', [HomeController::class, 'index'])->name('trainer_index');
    Route::get('/my-trainees', [HomeController::class, 'trainees'])->name('my_trainees');
    Route::get('/trainee/search', [HomeController::class, 'traineeSearch'])->name('traineeSearch');
    Route::get('/upcoming-session', [HomeController::class, 'upcomingSession'])->name('upcoming_session');
    Route::get('/previous-session', [HomeController::class, 'previousSession'])->name('previous_session');
    Route::get('/earnings', [HomeController::class, 'earnings'])->name('earnings');
    Route::get('/message/{id?}', [HomeController::class, 'message'])->name('message');
    Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
    Route::get('/all_messages', [HomeController::class, 'all_messages'])->name('all_messages');
    Route::post('/trainer/profile/update', [HomeController::class, 'profileUpdate'])->name('trainerProfileUpdate');
    Route::post('/trainer/removeTrainerImages', [HomeController::class, 'removeTrainerImages'])->name('removeTrainerImages');
    Route::get('/trainee/reschdule/appointment', [HomeController::class, 'rescheduleAppointment'])->name('reschedule-appointment');
    
    
    Route::put('/edit-caption/{id}', [HomeController::class, 'editCaption'])->name('edit-caption');
    Route::post('/document/upload', [HomeController::class, 'documentUpload'])->name('document-upload');
    Route::delete('/document/delete/{id}', [HomeController::class, 'documentDelete'])->name('document-delete');
    Route::delete('/image/delete/{id}', [HomeController::class, 'imageDelete'])->name('image-delete');

    Route::post('/trainer/image/update', [HomeController::class, 'profileImageUpdate'])->name('trainerProfileImageUpdate');
    Route::post('/trainer/coverImage/update', [HomeController::class, 'coverImageUpdate'])->name('trainerCoverImageUpdate');
    Route::post('/trainerPasswordUpdate', [HomeController::class, 'passwordUpdate'])->name('trainerPasswordUpdate');
    Route::post('/trainer/accept/session', [HomeController::class, 'trainerAcceptSession'])->name('trainerAcceptSession');
    Route::post('/trainer/reject/session', [HomeController::class, 'trainerRejectSession'])->name('trainerRejectSession');
    Route::get('/stripe/setup', [HomeController::class, 'stripeSetup'])->name('stripeSetup');
    Route::post('/stripe/setup/update', [HomeController::class, 'saveStripeKey'])->name('saveStripeKey');
    Route::get('/trainerlogout', [HomeController::class, 'logout'])->name('trainerlogout');
    Route::post('traineemsg', [HomeController::class, 'traineemsg'])->name('traineemsg');
    Route::get('/setup/account/', [HomeController::class, 'setupAccount'])->name('setup_account');
    Route::get('/setup/new/account/', [HomeController::class, 'setupNewAccount'])->name('setup_new_account');
    Route::post('/getTrainerSessionTimings', [HomeController::class, 'getSessionTimings'])->name('getTrainerSessionsTimings');
    Route::post('/rebookappointment', [HomeController::class, 'bookAppointment'])->name('rebook-appointment');
    Route::get('/cancel-appointment/{id}', [HomeController::class, 'cancel_appointment'])->name('trainer_appointment_cancel');

// route from trainee
//    Route::get('/appointment_cancel/{id}', [App\Http\Controllers\Trainee\HomeController::class, 'appointment_cancel'])
//        ->name('appointment_cancel');

});

<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UsersController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group([], function () {


//    Route::get('a',function(){
//        return 'a';
//    });

//    Route::get('/home', function(){
//        return 'homecontroller';
//    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');

    Route::get('/users/listing', [UsersController::class, 'index'])->name('usersListing');
    Route::get('/sessions/listing', [HomeController::class, 'getSessionsListing'])->name('sessionsListing');
    Route::get('/view/user/{id}', [UsersController::class, 'viewUser'])->name('viewUser');
    Route::get('/delete/user/{id}', [UsersController::class, 'deleteUser'])->name('deleteUser');
    Route::get('/earnings', [HomeController::class, 'earnings'])->name('admin_earnings');
    Route::get('/pay-to-trainer', [HomeController::class, 'TrainersPayment'])->name('pay-to-trainer');
    Route::get('/managerates', [HomeController::class, 'getrates'])->name('managerates');
    Route::post('/deleteRates', [HomeController::class, 'deleteRates'])->name('deleteRates');
    Route::post('/view/user', [HomeController::class, 'updateUserPref'])->name('updateUserPref');
    Route::post('/setterainerrates', [HomeController::class, 'setTerainerRates'])->name('setterainerrates');

    Route::get('/terms/{title}', [HomeController::class, 'terms'])->name('terms');
    Route::post('/termsUpdate/{title}', [HomeController::class, 'termsUpdate'])->name('termsUpdate');

    Route::get('/review', [HomeController::class, 'review'])->name('reviews');
    Route::get('/admin-profile', [HomeController::class, 'adminProfile'])->name('adminProfile');
    Route::post('/admin/profile/update', [HomeController::class, 'adminProfileUpdate'])->name('adminProfileUpdate');
    Route::post('/adminPasswordUpdate', [HomeController::class, 'passwordUpdate'])->name('adminPasswordUpdate');
    Route::post('/admin/image/update', [HomeController::class, 'profileImageUpdate'])->name('adminProfileImageUpdate');
    Route::get('/trainee-profile', [HomeController::class, 'traineeProfile'])->name('traineeProfile');
    Route::post('/approved/trainer', [HomeController::class, 'approvedTrainer'])->name('approvedTrainer');
    Route::get('/approve/review', [HomeController::class, 'approveReview'])->name('approveReview');
    Route::get('/remove/review', [HomeController::class, 'removeReview'])->name('removeReview');
    Route::get('/logout', [HomeController::class, 'logout'])->name('admin.logout');
    Route::post('/messagechat', [UsersController::class, 'messagechat'])->name('messagechat');
    Route::get('/sessions/{id}', [HomeController::class, 'getTrainerSessions'])->name('trainer_sessions');
    Route::post('/payment', [HomeController::class, 'makePayment'])->name('make_payment');
    Route::post('/all/payments', [HomeController::class, 'makeAllPayments'])->name('make_all_payments');
    Route::post('/transfer', [HomeController::class, 'transferPayment'])->name('transfer_payment');
    Route::get('/transfers/{criteria?}', [HomeController::class, 'transferHistory'])->name('transfer_history');
    Route::get('/setting', [HomeController::class, 'settings'])->name('settings');
    Route::post('setting/update', [HomeController::class, 'settingsUpdate'])->name('settings_update');
});

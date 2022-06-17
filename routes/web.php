<?php

use App\Http\Controllers\MessageController;
use App\Http\Controllers\Web\WebViewController;
use App\Jobs\sendAcceptanceJob;
use App\Jobs\SendEmailJob;
use App\Mail\sendAcceptAppointmentMailable;
use App\Mail\SendEmailMailable;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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


Route::group([], function () {

    Route::get('/', [WebViewController::class, 'index'])->name('/');
    Route::get('/faqss', [WebViewController::class, 'faqs'])->name('faqss');
    Route::get('/terms', [WebViewController::class, 'termsConditions'])->name('termsConditions');
    Route::get('/privacy', [WebViewController::class, 'privacy'])->name('privacy');
    Route::get('trainee', [WebViewController::class, 'trainee_index'])->name('trainee_index');
    Route::get('/search', [HomeController::class, 'search_trainers'])->name('search_trainers');
    
    Route::get('/messages/{trainer_id}/{trainee_id}/{type?}', [HomeController::class, 'messages'])->name('get_messages');

    Route::get('/account/login', [WebViewController::class, 'accountLogin'])->name('accountLogin');
    Route::get('/accountType', [WebViewController::class, 'accountType'])->name('accountType');
    Route::get('/account/authStatus', [WebViewController::class, 'authStatus'])->name('authStatus');
    Route::get('/account/forgot', [WebViewController::class, 'forgot'])->name('forgot');

    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
    Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

    Route::post('/cEfR', [SignupController::class, 'checkEmailForReg'])->name('checkEmailForReg');
    Route::get('/trainer/signup', [SignupController::class, 'showTrainerSignupForm'])->name('showTrainerSignupForm');
    Route::post('/trainer/signup', [SignupController::class, 'trainerSignup'])->name('trainerSignup');
    Route::post('/trainer/login', [SignupController::class, 'loginAttempt'])->name('loginAttempt');
    Route::get('/account/trainee/signup', [SignupController::class, 'showTraineeSignupForm'])->name('showtraineeSignup');
    Route::post('/trainee/signup', [SignupController::class, 'traineeSignup'])->name('traineeSignup');

    Route::get('confirm/email/{code}', [HomeController::class, 'confirmEmail'])->name('confirm.email');
    Route::post('/contactus/mail', [HomeController::class, 'contactusmail'])->name('contactusmail');

    Route::resource('promotionsSends', App\Http\Controllers\Promotions_sendController::class)->middleware('admin.auth');
    Route::resource('promotions', App\Http\Controllers\PromotionController::class)->middleware('admin.auth');

    Route::resource('faqs', App\Http\Controllers\FaqController::class)->middleware('admin.auth');
    Route::resource('howitworks', App\Http\Controllers\HowitworksController::class)->middleware('admin.auth');

    Route::post('sendemail', [App\Http\Controllers\Promotions_sendController::class, 'sendemail'])->name('sendemail')->middleware('admin.auth');
    Route::post('userforemail/{id}', [App\Http\Controllers\Promotions_sendController::class, 'userforemail'])->name('userforemail')->middleware('admin.auth');
});
Route::resource('/message', MessageController::class)->middleware('auth');
Route::get('/appointment_cancel/{id}', [App\Http\Controllers\Trainee\HomeController::class, 'appointment_cancel'])
    ->name('appointment_cancel')->middleware('auth');

Auth::routes();


Route::get('migrate', function () {
    \Artisan::call('migrate:fresh --seed');
    dd("Migration Is Done");
});
Route::get('optimize', function () {
    \Artisan::call('optimize:clear');
    dd("Optimization Run");
});
Route::get('cache', function () {
    \Artisan::call('cache:cache');
    dd("Optimization Run");
});
Route::get('route_clear', function () {
    \Artisan::call('route:cache');
    dd("Optimization Run");
});

//Route::get('/curl', function () {
//    $url = "https://3bc891c2926ded8d34e2bb6d52518916:d75104b20c3f2212458a21b62dbcc6e0@https://bloom-shakalaka.myshopify.com/admin/products.json";
//
//    $curl = curl_init();
//    curl_setopt($curl, CURLOPT_URL, $url);
//    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
//    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//    curl_setopt($curl, CURLOPT_VERBOSE, 0);
//    curl_setopt($curl, CURLOPT_HEADER, 1);
//    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
////    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($products_array));
//    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
//    $response = curl_exec($curl);
//    curl_close($curl);
//
//    print_r($response);
//});


//Route::post('sendemail', function () {
////    Mail::to('zunair.ahmed@golpik.com')->send(new SendEmailMailable());
//    $job = (new SendEmailJob())->delay(Carbon::now()->addSeconds(10));
//    dispatch($job);
//    return 'Email is sent';
//})->name('sendemail');


Route::get('/email', function () {
    dispatch(new sendAcceptanceJob());
    return 'Send Successfully';
});


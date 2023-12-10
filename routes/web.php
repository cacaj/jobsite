<?php

use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\JobListController;
use App\Http\Controllers\SubsriptionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserPostController;
use App\Http\Middleware\isAdmin;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::group(['middleware' => 'prevent-back-history'],function(){
    Route::get('/', [JobListController::class, 'index'])->middleware('isLogged')->name('main');
    Route::get('/home', [DashboardController::class, 'home'])->middleware('verified')->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['verified', 'isAdmin'])->name('dashboard');
});

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request){
   $request->fulfill();
   if (auth()->user()->user_type == 'user') {
       return redirect('/home');
    }
   return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/resume/upload', [FileUploadController::class, 'store'])->middleware('auth');
Route::post('/applications/{listingId}/submit' , [FileUploadController::class, 'apply'])->name('application.submit');
Route::get('/jobs/{listing:slug}' , [JobListController::class, 'show'])->name('job.show');
Route::get('/jobs', [JobListController::class, 'index'])->name('listing.index');

Route::get('/register/user', [UserController::class, 'createUser'])->name('create.user')->middleware('isLogged');
Route::post('/register/user', [UserController::class, 'storeUser'])->name('store.user');

Route::get('/register/admin', [UserController::class, 'createAdmin'])->name('create.admin')->middleware('isLogged');
Route::post('/register/admin', [UserController::class, 'storeAdmin'])->name('store.admin');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('isLogged');
Route::post('/login', [UserController::class, 'postLogin'])->name('login.post');

Route::post('/logout', [UserController::class, 'postLogout'])->name('logout');

Route::get('user/profile', [UserController::class, 'profile'])->name('user.profile')->middleware(['auth','verified']);
Route::post('user/profile', [UserController::class, 'update'])->name('user.update.profile')->middleware(['auth','verified']);
Route::get('user/profile/user', [UserController::class, 'userProfile'])->name('user.user.profile')->middleware(['auth','verified']);
Route::post('user/password', [UserController::class, 'updatePassword'])->name('user.password')->middleware(['auth','verified']);
Route::post('upload/resume', [UserController::class, 'uploadResume'])->name('upload.resume')->middleware(['auth','verified']);


Route::get('/verify', [DashboardController::class, 'verify'])->name('verification.notice');
Route::get('/resend/verification/email', [DashboardController::class, 'resend'])->name('resend.email');

Route::get('subscribe', [SubsriptionController::class, 'subscribe'])->name('subscribe');
Route::get('pay/weekly', [SubsriptionController::class, 'initiatePayment'])->name('pay.weekly');
Route::get('pay/monthly', [SubsriptionController::class, 'initiatePayment'])->name('pay.monthly');
Route::get('pay/yearly', [SubsriptionController::class, 'initiatePayment'])->name('pay.yearly');
Route::get('payment/success', [SubsriptionController::class, 'paymentSuccess'])->name('payment.success');
Route::get('payment/cancel', [SubsriptionController::class, 'cancel'])->name('payment.cancel');

Route::get('job/create', [UserPostController::class, 'create'])->name('job.create');
Route::post('job/store', [UserPostController::class, 'store'])->name('job.store');
Route::get('job/{listing}/edit', [UserPostController::class, 'edit'])->name('job.edit');
Route::put('job/{id}/edit', [UserPostController::class, 'update'])->name('job.update');
Route::get('job', [UserPostController::class, 'index'])->name('job.index');
Route::delete('job/{id}/delete', [UserPostController::class, 'destroy'])->name('job.delete');

Route::get('applicants', [ApplicantController::class, 'index'])->name('applicants.index');
Route::get('applicants/{listing:slug}', [ApplicantController::class, 'show'])->name('applicants.show');

Route::post('shortlist/{listingId}/{userId}' , [ApplicantController::class, 'shortlist'])->name('applicants.shortlist');

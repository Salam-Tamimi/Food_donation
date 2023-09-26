<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserDonationController;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\OtherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\VolanteerController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\FacebookController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;

use App\Models\UserDonation;
use Illuminate\Support\Facades\Blade;

Route::get('/money', function () {
    return view('Pages.money-donation');
});

Route::get('/money/{id}', [DonationController::class, 'show'])->middleware(['auth', 'verified'])->name('money.show');
Route::get('/things/{id}', [DonationController::class, 'shows'])->middleware(['auth', 'verified'])->name('things.show');
Route::get('/other', [OtherController::class, 'show'])->middleware(['auth', 'verified'])->name('other.show');
Route::post('/things/{id}', [UserDonationController::class, 'update'])->name('food.store');
Route::post('/money', [UserDonationController::class, 'store'])->name('money.store');
Route::post('/other', [OtherController::class, 'store'])->name('other.store');

Route::post('paypal/payment', [PaymentDetailsController::class, 'payment'])->name('paypal');
Route::get('paypal/success', [PaymentDetailsController::class, 'success'])->name('paypal_success');
Route::get('paypal/cancel', [PaymentDetailsController::class, 'cancel'])->name('paypal_cancel');

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/dashboard_login', function () {
    return view('dashboard.dashboard_login');
})->name('dashboard.dashboard_login');



Route::resource('dashboard/users', UserController::class)->middleware('adminMiddleWare');
Route::resource('dashboard/admins', AdminController::class)->middleware('adminMiddleWare');
Route::resource('dashboard/categories', CategoryController::class)->middleware('adminMiddleWare');
Route::resource('dashboard/donations', DonationController::class)->middleware('adminMiddleWare');
Route::resource('dashboard/jobs', JobController::class)->middleware('adminMiddleWare');
Route::resource('dashboard/partners', PartnerController::class)->middleware('adminMiddleWare');
Route::resource('paymentdetails', PaymentDetailsController::class)->middleware('adminMiddleWare');
Route::resource('dashboard/profiles', ProfileController::class);
Route::resource('dashboard/user-donations', UserDonationController::class)->middleware('adminMiddleWare');
Route::resource('dashboard/volanteers', VolanteerController::class)->middleware('adminMiddleWare');
require __DIR__ . '/auth.php';


Route::get('/singleDonation2/{id}', [DonationController::class, 'show2'])->name('singleDonation2');
Route::get('/singleDonation/{id}', [DonationController::class, 'show3'])->name('singleDonationCoupons');

Route::get('/subcategory/{id}', [DonationController::class, 'showw'])->name('subcategory');



// BanySaleh routes start

Route::controller(HomeController::class)->group(function () {
    Route::post('home', 'index');
    Route::get('/', 'index');
    Route::post('save_volanteer', 'storeVolanteer');
    Route::get('contact-us', 'show_contact');
});
Route::controller(ContactController::class)->group(function () {
    Route::get('contact-us', 'index');
    Route::post('store-contacts', 'store');
});
Route::controller(EmailController::class)->group(function () {
    Route::post('send-email-to-all-users', 'sendEmailToAllUsers');
    Route::get('send-email', 'index');
});

// BanySaleh routes end



/*------------ Login With google & Facebook ------------*/


Route::get('auth/google', [GoogleAuthController::class, 'redirect'])->name('google-auth');
Route::get('auth/google/call-back', [GoogleAuthController::class, 'callbackGoogle']);

Route::get('auth/facebook', [FacebookController::class, 'facebookPage'])->name('facebook-auth');
Route::get('auth/facebook/callback', [FacebookController::class, 'facebookredirect']);

Route::get('/certificate/download', [UserProfileController::class,'download'])->name('certificate.download');

Route::post('welcome/dashboard', [CustomAuthController::class, 'loginUser'])->name('dashlog');


Route::get('main/dashboard', [CustomAuthController::class, 'sidebar'])->middleware('adminMiddleWare');


Route::get('dashboard_logout', [CustomAuthController::class, 'logout']);



// Chat
Route::get('/users', CreateChat::class)->name('users');
Route::get('/chat/{key?}', Main::class)->name('chat');

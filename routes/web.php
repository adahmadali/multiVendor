<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;

//frontend all controller
use App\Http\Controllers\Frontend\SocialliteController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
//
Route::get('/socialite/create', [SocialliteController::class, 'create'])->name('socialite.create');
Route::get('/sociallogin/store', [SocialliteController::class, 'login'])->name('socialite.store');



Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin Routes
Route::middleware('auth', 'verified', 'role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('/admin/profile/update/{id}', [AdminController::class, 'updateProfile'])->name('admin.profile.update');
    Route::get('/admin/changePassword', [AdminController::class, 'changePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'updatePassword'])->name('admin.update.password');
});
//Admin Routes without login
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');

// Vendor Routes
//with login
Route::middleware('auth', 'verified','role:vendor')->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'index'])->name('vendor.dashboard');
    Route::post('/vendor/logout', [VendorController::class, 'logout'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'profile'])->name('vendor.profile');
    Route::post('/vendor/profile/update/{id}', [VendorController::class, 'updateProfile'])->name('vendor.profile.update');
    Route::get('/vendor/changePassword', [VendorController::class, 'changePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::class, 'updatePassword'])->name('vendor.update.password');
    
});

//without login
Route::get('/vendor/login', [VendorController::class, 'login'])->name('vendor.login');
Route::get('/vendor/register', [VendorController::class, 'register'])->name('vendor.register');


//user routes
     //with login


    //without login




require __DIR__.'/auth.php';

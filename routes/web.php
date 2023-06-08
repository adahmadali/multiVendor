<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Vendor\VendorController;

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
    
});


    //without login

//user routes
     //with login


    //without login




require __DIR__.'/auth.php';

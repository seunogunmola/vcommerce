<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//MIDDLE WARE TO PREVENT USERS WITHOUT ADMIN ROLE
Route::middleware(['auth','role:admin'])->group(
    function(){
        // ADMIN ROUTES 
        Route::controller(AdminController::class)->group(
            function(){
                Route::get('/admin/dashboard','dashboard')->name('admin.dashboard');
                Route::get('/admin/logout','logout')->name('admin.logout');
                // PROFILE 
                Route::get('/admin/profile','profile')->name('admin.profile');
                Route::post('/admin/profile','updateProfile')->name('admin.profile.update');
            }
        );
    }
);


// VENDOR ROUTES 
Route::middleware(['auth','role:vendor'])->group(
    function(){
        Route::get('/vendor/dashboard',[VendorController::class,'dashboard'])->name('vendor.dashboard');
    }
);



Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
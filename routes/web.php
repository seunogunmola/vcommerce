<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\VendorController;


Route::get('/', [FrontendController::class,'index'])->name('home');

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

                // PASSWORD UPDATE 
                Route::get('admin/password','password')->name('admin.password');
                Route::post('admin/password','updatePassword')->name('admin.password.update');
            }
        );
    }
);


// VENDOR ROUTES 
Route::middleware(['auth','role:vendor'])->group(
    function(){
        Route::controller(VendorController::class)->group(
            function(){
                 #VENDOR DASHBOARD PAGE
                Route::get('/vendor/dashboard',[VendorController::class,'dashboard'])->name('vendor.dashboard');

                #VENDOR PROFILE
                Route::get('/vendor/profile','profile')->name('vendor.profile');

                #UPDATE PROFILE
                Route::post('/vendor/profile','updateProfile')->name('vendor.profile.update');

                 #VENDOR CHANGE PASSWORD PAGE
                Route::get('/vendor/password','password')->name('vendor.password');
                #UPDATE PASSWORD
                Route::post('/vendor/password','updatePassword')->name('vendor.password.update');

                #VENDOR LOGOUT
                Route::get('/vendor/logout','logout')->name('vendor.logout');
            }
        );
        
    }
);


// ADMIN LOGIN 
Route::get('/admin',[AdminController::class,'login'])->name('admin.login'); 
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login'); 


// VENDOR LOGIN 
Route::get('/vendor',[VendorController::class,'login'])->name('vendor.login');
Route::get('/vendor/login',[VendorController::class,'login'])->name('vendor.login');
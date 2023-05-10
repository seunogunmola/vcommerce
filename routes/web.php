<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;


#SHOW LANDING PAGE
Route::get('/', [FrontendController::class,'index'])->name('home');

#WRAP AUTHENTICATED PAGES IN MIDDLEWARE
Route::middleware(['auth'])->group(
    function(){        
        Route::controller(UserController::class)->group(function(){
            // SHOW USER DASHBOARD 
            Route::get('/dashboard','dashboard')->name('dashboard');            

            //SAVE PROFILE EDIT DATA
            Route::post('/profile/{id}','updateUserProfile')->name('user.profile.update');

            //UPDATE USER PASSWORD
            Route::post('/password/{id}','updateUserPassword')->name('user.password.update');

            // LOGOUT
            Route::get('/user/logout','logout')->name('user.logout');    

        });
        
    }
);

// ADMIN LOGIN 
Route::get('/admin',[AdminController::class,'login'])->name('admin.login'); 
Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login'); 

// VENDOR LOGIN 
Route::get('/vendor',[VendorController::class,'login'])->name('vendor.login');
Route::get('/vendor/login',[VendorController::class,'login'])->name('vendor.login');

//MIDDLE WARE TO PREVENT USERS WITHOUT ADMIN ROLE
Route::middleware(['auth','role:admin'])->group(
    function(){
        // ADMIN ROUTES 
        Route::controller(AdminController::class)->group(
            function(){
                // SHOW ADMIN DASHBOARD 
                Route::get('/admin/dashboard','dashboard')->name('admin.dashboard');
                Route::get('/admin/logout','logout')->name('admin.logout');
                // PROFILE 
                Route::get('/admin/profile','profile')->name('admin.profile');
                Route::post('/admin/profile','updateProfile')->name('admin.profile.update');

                // PASSWORD UPDATE 
                Route::get('admin/password','password')->name('admin.password');
                Route::post('admin/password','updatePassword')->name('admin.password.update');

                // BRANDS 
                Route::controller(BrandController::class)->group(
                    function(){
                        // ALL BRANDS 
                        Route::get('/admin/brands','index')->name('admin.brand.all');
                        // SHOW BRAND CREATION FORM 
                        Route::get('/admin/brands/create','create')->name('admin.brand.create');
                        // STORE BRAND CREATION INFORMATION 
                        Route::post('/admin/brands/store','store')->name('admin.brand.store');
                        // SHOW BRAND EDITING FORM 
                        Route::get('/admin/brands/edit/{id}','edit')->name('admin.brand.edit');
                        // STORE BRAND EDITING INFORMATION 
                        Route::post('/admin/brands/update/{id}','update')->name('admin.brand.update');
                        // DELETE BRAND
                        Route::get('/admin/brands/delete/{id}','delete')->name('admin.brand.delete');
                    }
                );
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


require __DIR__.'/auth.php';
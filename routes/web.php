<?php

//Use Controllers
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\categoryController;
use App\Http\Middleware\userType;
//Home Page
Route::get('/',function(){
    return view('login');
});

//Register Page
Route::get('/register',[homeController::class,'registerPage'])->name('registerPage');

//Register Url Data Pass
Route::post('/register',[homeController::class,'register'])->name('register');

//Login Page
Route::get('/login',[homeController::class,'loginPage'])->name('loginPage');

//Login Url Data Pass
Route::post('/loginAttempt',[homeController::class,'loginAttempt'])->name('loginAttempt');

//Admin Login Page
Route::get('/adminlogin',[homeController::class,'loginPageAdmin'])->name('loginPageAdmin');

//Admin Login Url Data Pass
Route::post('/loginAttemptAdmin',[homeController::class,'loginAttemptAdmin'])->name('loginAttemptAdmin');

//Route Checking Login Present Or Not
Route::middleware('auth')->group(function(){

    //Route Middleware For Checking UserType
    Route::middleware(userType::class)->group(function(){

        //Route For Dashboard
        Route::get('/dashboard',[homeController::class,'dashboard'])->name('dashboard');

        //Route Group For Category
        Route::prefix('category')->name('category.')->group(function(){
            //Route For Category Index Page
            Route::get('/',[categoryController::class,'index'])->name("index");
            //Route For Create Category
            Route::get('/create',[categoryController::class,'create'])->name('create');
            //Route For Store Category
            Route::post('/store',[categoryController::class,'store'])->name('store');
            //Route For Delete Category
            Route::get('/destroy/{id}',[categoryController::class,'destroy'])->name('destroy');
            //Route For Edit Category
            Route::get('/edit/{id}',[categoryController::class,'edit'])->name('edit');
            //Route For Update Data For Edit Category
            Route::post('/update',[categoryController::class,'update'])->name('update');
            //Route For Bulk Upload
            Route::get('/bulkUpload',[categoryController::class,'bulkUpload'])->name('bulkUpload');
            //Route For Bulk Upload In Database
            Route::post('/bulkUploadAttempt',[categoryController::class,'bulkUploadAttempt'])->name('bulkUploadAttempt');
            //Route For Bulk Image Upload
            Route::get('/bulkImageUpload',[categoryController::class,'bulkImageUpload'])->name('bulkImageUpload');
            //Route For Bulk Image Upload Attempt
            Route::post('/bulkImageUploadAttempt',[categoryController::class,'bulkImageUploadAttempt'])->name('bulkImageUploadAttempt');
        });

    });

    //Route For Logout
    Route::get('/logout',[homeController::class,'logout'])->name('logout');
});

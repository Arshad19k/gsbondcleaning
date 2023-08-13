<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SendEmailController;

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

//login
Route::get('/', function () {
    return view('auth.login');
})->name('login');


Route::post('/auth_login',[LoginController::class,'login'])->name('auth.login');
Route::get('/auth_logout',[LoginController::class,'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    
    //dashboard Route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashobard');
    
    //User Route
    Route::get('/users',[UserController::class,'index'])->name('usersList');
    Route::post('/add_user',[UserController::class,'store'])->name('addUser');
    Route::get('/get_user',[UserController::class,'edit'])->name('getUser');
    Route::get('/update_user',[UserController::class,'update'])->name('edituser');
    Route::get('/delete_user',[UserController::class,'destroy'])->name('deleteUser');
    Route::post('/user_pass',[UserController::class,'changePassword'])->name('user_pass');
    
    // Orders Route
    Route::get('/orders', [OrderController::class,'index'])->name('orderList');
    Route::get('/addOrder', [OrderController::class, 'create'])->name('addForm');
    Route::get('/viewOrder', [OrderController::class, 'show'])->name('viewOrderDetail');
    Route::post('/storeOrder', [OrderController::class, 'store'])->name('storeform');
    Route::get('/editOrder/{id}', [OrderController::class, 'edit'])->name('getOrderDetail');
    Route::post('/getOrder', [OrderController::class, 'update'])->name('editOrder');
    Route::post('/uploadImage', [OrderController::class, 'uploadImage'])->name('uploadImage');
    Route::get('/deleteServimg', [OrderController::class, 'deleteImage'])->name('deleteServImage');
    Route::get('/delete_order', [OrderController::class, 'destroy'])->name('deleteOrder');
    Route::get('/sendmail_user', [OrderController::class, 'getUserDetailToSendEmail'])->name('getSendEmail_detail');

    // Send Email
    Route::post('/send_email', [SendEmailController::class, 'index'])->name('sendEmailToCustomer');
    Route::get('/email_details', [SendEmailController::class, 'emailDetails'])->name('emailDetail');

    // Service Route
    // Route::get('/services',[ServiceController::class,'index'])->name('serviceList');
    // Route::post('/add_services',[ServiceController::class,'store'])->name('addSerivce');
    // Route::get('/get_service',[ServiceController::class,'edit'])->name('getSerivce');
    // Route::post('/update_service',[ServiceController::class,'update'])->name('update.service');
    // Route::post('/delete_service',[ServiceController::class,'destroy'])->name('delete.service');
});
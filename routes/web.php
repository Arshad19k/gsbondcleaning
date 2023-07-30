<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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
    Route::get('/dashboard', function() {  return view('dashboard');})->name('dashobard');
    
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
    Route::post('/storeOrder', [OrderController::class, 'store'])->name('storeform');
    Route::get('/editOrder', [OrderController::class, 'edit'])->name('getOrderDetail');
    Route::post('/updateOrder', [OrderController::class, 'update'])->name('updateOrder');


    // Service Route
    Route::get('/services',[ServiceController::class,'index'])->name('serviceList');

});
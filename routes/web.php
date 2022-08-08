<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
  
/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager');
    Route::get('/manager', function () {
        return view('backend.manager.manager');
    });
    Route::get('/manager/fillUser', function () {
        return view('backend.manager.page.fillUser.index');
    });
    Route::get('/manager/user', function () {
        return view('backend.manager.page.user.index');
    });
    Route::get('/manager/customer', function () {
        return view('backend.manager.page.customer.create');
    });
    // Route::resource('manager/dashboard', UserController::class);
    // Route::resource('manager/user', UserController::class);
    // Route::resource('manager/customer', UserController::class);
    // Route::resource('manager/informationUser', UserController::class);
    // Route::resource('manager/print ', UserController::class);
    // Route::resource('manager/manageParcels', UserController::class);
    // Route::resource('manager/tracking', UserController::class);
   
});
 
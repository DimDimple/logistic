<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\PackageController;
// use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProcessController;
use App\Http\Controllers\backend\DeclineController;
use App\Http\Controllers\backend\PendingController;
use App\Http\Controllers\backend\CompletedController;
use App\Http\Controllers\backend\StorageController;
use App\Http\Controllers\backend\PTypesController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\PositionController;
use App\Http\Controllers\frontend\EditProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\ManagerController;



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

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/', function () {
    return view('newwelcome');
});

Route::get('/track', function () {
    return view('frontend.track');
});

Route::get('/contact', function () {
    return view('frontend.aboutUs');
});

Route::get('/information', function () {
    return view('frontend.information.faq');
});

Route::get('/information/faq', function () {
    return view('frontend.information.faq');
});

Route::get('/information/termXcondition', function () {
    return view('frontend.information.termXcondition');
});

Route::get('/information/privacy', function () {
    return view('frontend.information.privacy');
});
Route::get('/edit', function () {
    return view('frontend.userEdit.editProfile');
});


Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {

    // Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/changepassword', [PasswordController::class, 'changePwd'])->name('changePwd');
    Route::post('/updatepassword', [PasswordController::class, 'updatePwd'])->name('updatePwd');

    Route::get('/editprofile', [ProfileController::class,'edit'])->name('profile.edit');
    Route::put('/editprofile', [ProfileController::class,'update'])->name('profile.update');



});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin', [HomeController::class, 'adminHome'])->name('admin');
    Route::resource('/new/admin', AdminController::class);
    Route::resource('/admin/user', UserController::class);
    // Route::resource('/admin/employee', EmployeeController::class);
    Route::resource('/admin/location', LocationController::class);
    Route::get('admin/branch/updatestatus/{id}', [BranchController::class, 'updateStatus'])->name('updatestatus');
    Route::resource('/admin/branch', BranchController::class);
    // Route::resource('/admin/manager', ManagerController::class);
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {

    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager');
    // Route::get('/manager/home', [DashboardController::class, 'managerHome'])->name('manager');
    Route::get('/manager', function () {
        return view('backend.manager.manager');
    });
    Route::resource('/manager/packages', PackageController::class);
    Route::resource('/manager/decline', DeclineController::class);
    Route::resource('/manager/process', ProcessController::class);
    Route::resource('/manager/completed', CompletedController::class);
    Route::resource('/manager/pending', PendingController::class);
    // Route::resource('/manager/packageType', PackageTypeController::class);

    Route::get('manager/packages/status/{id}', [PackageController::class, 'updatePayStatus', 'updateStatus'])->name('updatepaystatus', 'updatestatus');
    // Route::resource('/manager/user', UserController::class);
    Route::resource('/manager/packageType', PTypesController::class);
    Route::resource('/manager/position', PositionController::class);
    Route::resource('/manager/employeebranch', EmployeeController::class);
    Route::resource('/manager/storage', StorageController::class);

    // Route::get('/manager/create',function(){
    //         return view('backend.manager.page.packages.create');
    // });

    // Route::get('/manager/goo', function () {
    //     return view('backend.manager.page.goods.create');
    // });

    // Route::get('/manager/pacakgePT', function () {
    //     return view('backend.manager.page.packages.indexPT');
    // });


    // Route::get('/manager/customer', function () {
    //     return view('backend.manager.page.customer.index');
    // });
    Route::get('/manager/tracking', function () {
        return view('backend.manager.page.track.index');
    });
    // Route::get('/manager/managePackage', function () {
    //     return view('backend.manager.page.managePackage.index');
    // });
    // Route::resource('manager/dashboard', UserController::class);
    // Route::resource('manager/user', UserController::class);
    // Route::resource('manager/customer', UserController::class);
    // Route::resource('manager/informationUser', UserController::class);
    // Route::resource('manager/print ', UserController::class);
    // Route::resource('manager/manageParcels', UserController::class);
    // Route::resource('manager/tracking', UserController::class);

});

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
use App\Http\Controllers\backend\ShippedController;
use App\Http\Controllers\backend\PendingController;
use App\Http\Controllers\backend\CompletedController;
use App\Http\Controllers\backend\DashbaordController;
use App\Http\Controllers\backend\StorageController;
use App\Http\Controllers\backend\PTypesController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\PositionController;
use App\Http\Controllers\backend\TrackController;
use App\Http\Controllers\frontend\EditProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ContactController;

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
    return view('frontend.contactUs');
});

Route::post('/contact/store',[ContactController::class, 'store'])->name('contact.store');

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


// Route::get('/orderlist', function () {
//     return view('frontend.profile.orderList');
// });


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

    Route::get('/editprofile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::put('/editprofile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('/editprofile', [ProfileController::class, 'upload'])->name('profile.upload');

    Route::get('/orderlist',[ListController::class, 'index']);
    Route::get('/emptylist',[ListController::class, 'index']);

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

    // Route::post('admin/contact',[ContactController::class,'store'])->name('contact.store');

    Route::get('admin/contact',[ContactController::class,'index'])->name('contact.index');
    Route::get('admin/show/{id}',[ContactController::class,'show'])->name('contact.show');
    Route::delete('admin/delete/{id}',[ContactController::class,'destroy'])->name('contact.destroy');
    // Route::resource('admin/contact',[ContactController::class]);

});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {


    Route::get('manager/dashboard', [DashbaordController::class, 'index'])->name('manager');

    // Route::get('/manager/home', [DashboardController::class, 'managerHome'])->name('manager');
    // Route::get('/manager', function () {
    //     return view('backend.manager.manager');
    // });
    Route::resource('/manager/packages', PackageController::class);
    Route::resource('/manager/shipped', ShippedController::class);
    Route::resource('/manager/process', ProcessController::class);
    Route::resource('/manager/completed', CompletedController::class);
    Route::resource('/manager/pending', PendingController::class);
    // Route::resource('/manager/packageType', PackageTypeController::class);

    Route::get('/manager/packages/paystatus/{id}', [PackageController::class, 'updatePayStatus'])->name('updatepaystatus');
    Route::put('/manager/goods/status/update/{id}', [PackageController::class, 'updateStatus'])->name('updatestatus');
    //Route::post('/manager/packages/status/update', 'PackageController@updateStatus');

    // Route::resource('/manager/user', UserController::class);
    Route::resource('/manager/packageType', PTypesController::class);
    Route::resource('/manager/position', PositionController::class);
    Route::resource('/manager/employeebranch', EmployeeController::class);
    Route::resource('/manager/storage', StorageController::class);
    Route::put('/manager/goods/update/{id}', [StorageController::class, 'update'])->name('update');
    Route::get('/manager/tracking', [TrackController::class, 'track'])->name('track');
    Route::get('/manager/export/excel', [EmployeeController::class, 'excel'])->name('employee.export');
    Route::get('/manager/package/export/excel', [PackageController::class, 'excel'])->name('package.export');
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
    // Route::get('/manager/tracking', function () {
    //     return view('backend.manager.page.track.index');
    // });
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

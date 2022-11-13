<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\PackageController;
// use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\EmployeeController;
use App\Http\Controllers\backend\DashboardController;
// use App\Http\Controllers\backend\ProcessController;
use App\Http\Controllers\backend\ShippedController;
use App\Http\Controllers\backend\PendingController;
use App\Http\Controllers\backend\CompletedController;
use App\Http\Controllers\backend\DashbaordController;
use App\Http\Controllers\backend\PasswordAController;
use App\Http\Controllers\backend\PasswordAMController;
// use App\Http\Controllers\backend\StorageController;
use App\Http\Controllers\backend\PTypesController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\backend\PositionController;
use App\Http\Controllers\backend\ProfileAController;
use App\Http\Controllers\backend\ProfileAMController;
use App\Http\Controllers\backend\ReceivedController;
use App\Http\Controllers\backend\TrackController;
// use App\Http\Controllers\backend\TrackController;
use App\Http\Controllers\frontend\EditProfileController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\frontend\TrackingController;
use App\Http\Controllers\frontend\PackageTrackControlle;
use App\Http\Controllers\frontend\PackageTrackController;

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

/* update eror */
// Route::get('/track', function () {
//     return view('frontend.track');
// });

Route::get('/track', [TrackingController::class, 'track'])->name('track');
// Route::get('/track', [TrackingController::class, 'track']);
Route::get('/tracking', [TrackingController::class, 'track'])->name('tracking');

Route::resource('/packages', PackageTrackController::class);


Route::get('/contact', function () {
    return view('frontend.contactUs');
})->name('contact');



Route::get('/information', function () {
    return view('frontend.information.faq');
})->name('information');

Route::get('/information/faq', function () {
    return view('frontend.information.faq');
});

Route::get('/information/termXcondition', function () {
    return view('frontend.information.termXcondition');
});

Route::get('/information/privacy', function () {
    return view('frontend.information.privacy');
});
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// Route::get('/orderlist', function () {
//     return view('frontend.profile.orderList');
// });
// Route::get('/loginfirst', [::class,'index']);

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

    Route::get('/orderlist', [ListController::class, 'index'])->name('orderlist');
    Route::get('/emptylist', [ListController::class, 'index']);
    Route::get('/orderlist/process', [ListController::class, 'orderProcess'])->name('orderProcess');
    Route::get('/orderlist/completed', [ListController::class, 'orderCompleted'])->name('orderCompleted');



});




/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashbaordController::class, 'adminHome'])->name('admin');

    Route::get('/changepassworda', [PasswordAController::class, 'changePwdA'])->name('changePwdA');
    Route::post('/updatepassworda', [PasswordAController::class, 'updatePwdA'])->name('updatePwdA');

    Route::get('/editprofilea', [ProfileAController::class, 'edit'])->name('editProfile.admin');

    Route::put('/editprofilea', [ProfileAController::class, 'update'])->name('updateProfileA.update');

    Route::post('/editprofilea', [ProfileAController::class, 'upload'])->name('uploadProfileA.upload');


    Route::get('/admin/branch/export/excel', [BranchController::class, 'excel'])->name('branch.export');

    Route::get('/admin/user/resetpassword/{id}',[UserController::class,'resetPassword'])->name('user.resetPassword');
    Route::put('/admin/user/setpassword/{id}',[UserController::class,'setPassword'])->name('user.setPassword');

    Route::resource('/new/admin', AdminController::class);
    Route::resource('/admin/user', UserController::class);



    // Route::resource('/admin/employee', EmployeeController::class);
    Route::resource('/admin/location', LocationController::class);
    Route::get('admin/branch/updatestatus/{id}', [BranchController::class, 'updateStatus'])->name('updateBranchStatus');
    Route::get('/admin/branch/resetpassword/{id}',[BranchController::class,'resetPassword'])->name('branch.resetPassword');
    Route::put('/admin/branch/setpassword/{id}',[BranchController::class,'setPassword'])->name('branch.setPassword');
    Route::resource('/admin/branch', BranchController::class);
    // Route::resource('/admin/manager', ManagerController::class);

    // Route::post('admin/contact',[ContactController::class,'store'])->name('contact.store');

    Route::get('admin/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('admin/show/{id}', [ContactController::class, 'show'])->name('contact.show');
    Route::delete('admin/delete/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');
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


    Route::get('/changepasswordm', [PasswordAMController::class, 'changePwdM'])->name('changePwdM');
    Route::post('/updatepassworm', [PasswordAMController::class, 'updatePwdM'])->name('updatePwdM');

    Route::get('/editprofilem', [ProfileAMController::class, 'edit'])->name('editProfile.manager');

    Route::put('/editprofilem', [ProfileAMController::class, 'update'])->name('updateProfile.update');

    Route::post('/editprofilem', [ProfileAMController::class, 'upload'])->name('uploadProfile.upload');

    Route::resource('/manager/packages', PackageController::class);
    // Route::post('/manager/packages/search', [PackageController::class,'index'])->name('searchPackage');
    Route::resource('/manager/shipped', ShippedController::class);
    Route::resource('/manager/received', ReceivedController::class);
    Route::resource('/manager/completed', CompletedController::class);
    Route::resource('/manager/pending', PendingController::class);
    // Route::resource('/manager/packageType', PackageTypeController::class);
    Route::put('/manager/packages/updatestatus/{id}', [PackageController::class, 'updateStatus'])->name('updatestatus');
    Route::put('/manager/packages/filterstatus/update', [PackageController::class, 'filterupdatestatus'])->name('updatefilterstatus');
    Route::get('/manager/packages/paystatus/{id}', [PackageController::class, 'updatePayStatus'])->name('updatepaystatus');
    Route::get('/manager/package/export/excel', [PackageController::class, 'excel'])->name('package.export');
    // Route::put('/manager/goods/status/update/{id}', [StorageController::class, 'updateStatus'])->name('updatestatus');
    //Route::post('/manager/packages/status/update', 'PackageController@updateStatus');

    // Route::resource('/manager/user', UserController::class);
    Route::resource('/manager/packageType', PTypesController::class);
    Route::resource('/manager/position', PositionController::class);
    Route::resource('/manager/employeebranch', EmployeeController::class);
    // Route::resource('/manager/storage', StorageController::class);
    // Route::post('/manager/goods/search', [StorageController::class,'index'])->name('searchGoods');
    // Route::resource('/manager/goods', StorageController::class);

    Route::get('/manager/tracking', [TrackController::class, 'track'])->name('track');
    Route::get('/manager/export/excel', [EmployeeController::class, 'excel'])->name('employee.export');
    // Route::post('/manager/employees/search', [EmployeeController::class,'index'])->name('searchEmployee');

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

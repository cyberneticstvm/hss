<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelperController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\WeightageController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AdminController;

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
    return view('user.signup');
});
Route::get('/user/signup/', function () {
    return view('user.signup');
})->name('user.signup');

Route::get('/user/login/', function () {
    return view('user.login');
})->name('user.login');

Route::get('/admin/login/', function () {
    return view('admin.login');
})->name('admin.login');

Route::post('/user/signup/', [UserController::class, 'signup'])->name('signup');
Route::get('/user/verifyemail/{token}', [UserController::class, 'verifyemail'])->name('user.verifyemail');
Route::post('/user/login/', [UserController::class, 'login'])->name('login');
Route::post('/admin/login/', [UserController::class, 'adminlogin'])->name('admin.login');
Route::get('/forgot-password/', [UserController::class, 'forgotpwd'])->name('forgotpwd');
Route::post('/forgot-password/', [UserController::class, 'forgotpwdmail'])->name('forgotpwdmail');
Route::get('/password-reset/{token}/', [UserController::class, 'resetpasswordform'])->name('resetpasswordform');
Route::post('/password-reset/', [UserController::class, 'resetpassword'])->name('resetpassword');

Route::group(['middleware' => ['auth', 'verified']], function(){

    // helper //
    Route::get('/helper/projectstatus/', [HelperController::class, 'getProjectStatus']);
    // end helper //

    // user //
    Route::get('/user/dash/', [CompanyController::class, 'index'])->name('user.dash');      
    Route::get('/user/logout/', [UserController::class, 'userlogout'])->name('user.logout');
    // end user //

    // admin //
    Route::get('/admin/dash/', [CompanyController::class, 'index'])->name('admin.dash');
    Route::get('/admin/empanel-list/{id}', [CompanyController::class, 'show'])->name('admin.empanellist');
    Route::get('/admin/weightage/{id}/', [WeightageController::class, 'edit'])->name('admin.weightage.edit');
    Route::put('/admin/weightage/{id}/', [WeightageController::class, 'update'])->name('admin.weightage.update');
    Route::get('/admin/company/{id}/', [AdminController::class, 'company'])->name('admin.company');
    Route::post('/admin/company/update/', [AdminController::class, 'update'])->name('admin.company.update');
    Route::get('/admin/evaluate/{id}/', [AdminController::class, 'evaluate'])->name('admin.evaluate');
    Route::post('/admin/evaluate/{id}/', [AdminController::class, 'updateScore'])->name('admin.evaluate.update');    
    Route::get('/admin/logout/', [UserController::class, 'adminlogout'])->name('admin.logout');
    // end admin //

    // company //
    Route::get('/user/company/create/', [CompanyController::class, 'create'])->name('user.company.create');
    Route::post('/user/company/save/', [CompanyController::class, 'store'])->name('company.save');
    Route::get('/user/company/edit/{id}/', [CompanyController::class, 'edit'])->name('company.edit');
    Route::post('/user/company/update/{id}', [CompanyController::class, 'update'])->name('company.update');
    // end company //

    // settings //
    Route::get('/admin/settings/cut-off-mark/', [SettingsController::class, 'comedit'])->name('settings.com.edit');
    Route::post('/admin/settings/cut-off-mark/', [SettingsController::class, 'comupdate'])->name('settings.com.update');
    Route::get('/admin/settings/fyear/', [SettingsController::class, 'fyearedit'])->name('settings.fyear.edit');
    Route::post('/admin/settings/fyear/', [SettingsController::class, 'fyearupdate'])->name('settings.fyear.update');
    // end settings //

    // pdf //
    Route::get('/company-profile/{id}', [PDFController::class, 'profile'])->name('company.profile');
    // end pdf //
});
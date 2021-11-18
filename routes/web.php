<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainUserController;
use App\Http\Controllers\MainAdminController;

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

///////////////Start of email verify route //////////////
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');
//End of email verify reoute


///////////////Start of admin route //////////////
Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function(){
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});

Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('dashboard');
Route::get('/admin-logout',[AdminController::class, 'destroy'])->name('logout');

Route::get('/admin-profile-view',[MainAdminController::class, 'AdminProfile'])->name('admin-profile');
Route::get('/admin/edit/profile',[MainAdminController::class, 'editAdmin'])->name('edit-admin-profile');
Route::post('/admin/store/profile',[MainAdminController::class, 'adminStore'])->name('store-admin-profile');
Route::get('/admin/change/pass',[MainAdminController::class, 'passAdminChange'])->name('admin-pass-change');
Route::post('/admin/update/password',[MainAdminController::class, 'adminPassUpdate'])->name('admin-update-password');

///////////////End of admin route //////////////




///////////////Start of user route //////////////
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('user.index');
})->name('dashboard');


Route::get('/user-logout',[MainUserController::class, 'userLogout'])->name('user-logout');

Route::get('/user-profile',[MainUserController::class, 'userProfile'])->name('user-profile');
Route::get('/edit-profile',[MainUserController::class, 'editProfile'])->name('edit-profile');
Route::post('/store-profile',[MainUserController::class, 'storeProfile'])->name('store-profile');
Route::get('/change-pass',[MainUserController::class, 'passChange'])->name('pass-change');
Route::post('/update-password',[MainUserController::class, 'passUpdate'])->name('update-password');


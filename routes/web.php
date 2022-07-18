<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FloorController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CollageTimeController;
use App\Http\Controllers\DigitalSignageController;
use App\Http\Controllers\UserPermissionController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware('guest')->group(function () {
    Auth::routes(['logout' => false]);
});
Route::middleware(['auth', 'history'])->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user.prmission', UserPermissionController::class)->except(['index']);
    Route::get('cms/admin/user/{user}/prmission', [UserPermissionController::class, 'indexes'])->name('user.permission.index');
    Route::resource('permission', PermissionController::class);
    Route::resource('admins', AdminController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('images', ImageController::class);
    Route::resource('posts', PostController::class);
    Route::resource('buildings', BuildingController::class);
    Route::get('buildings/createFloor/{id}',[BuildingController::class,'createFloor'])->name('createFloor');
    Route::get('buildings/editFloor/{id}',[BuildingController::class,'editFloor'])->name('editFloor');
    Route::get('floor/creatRoom/{id}',[FloorController::class,'createRoom'])->name('createRoom');
    Route::get('floor/editRoom/{id}',[FloorController::class,'editRoom'])->name('editRoom');
    Route::resource('floors', FloorController::class);
    Route::resource('rooms', RoomController::class);
    Route::resource('collage_time', CollageTimeController::class);
    
    Route::get('digital_show/{build}/{floor}', [DigitalSignageController::class, 'show'])->name('digital_view');
   
    Route::get('change-password', [AuthController::class, 'changePass'])->name('changePass');
    Route::put('change_password', [AuthController::class, 'updatePass']);
    // Route::get('edit-profile', [AuthController::class, 'editProfile'])->name('edit-profile');
    // Route::put('edit-profile/{id}', [AdminController::class, 'updateProfile']);
    Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
});
Route::get('digital_signage/{build}/{floor}', [DigitalSignageController::class, 'index'])->name('digital_view');
Route::get('digital_index/{build}/{floor}', [DigitalSignageController::class, 'indexs'])->name('digital_index');
Route::view('/hello','tesr');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

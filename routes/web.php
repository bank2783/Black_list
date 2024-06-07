<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RosterController;
use App\Http\Middleware\checkLogin;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'loginView'])->name('login_view');

Route::middleware([checkLogin::class])->group(function () {
    Route::get('show-roster',[HomeController::class,'showroster'])->name('show_roster_view');
    Route::get('roster-management',[HomeController::class,'showRosterManagementPage'])->name('show_roster_management_view');
    Route::post('store-roster',[RosterController::class,'storeRoster'])->name('store_roster');
    Route::post('edit-roster/{id}',[RosterController::class,'editRoster'])->name('editRoster');
    Route::post('delete-roster/{id}',[RosterController::class,'destroyRoster'])->name('delete_roster');
    
});

Route::get('login',[AuthController::class,'loginView'])->name('login');
Route::post('login-post',[AuthController::class,'login'])->name('login_post');
Route::get('logout',[AuthController::class,'logout'])->name('logout_post');
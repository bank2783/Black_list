<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\checkLogin;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login',[AuthController::class,'loginView'])->name('login_view');

Route::middleware([checkLogin::class])->group(function () {
    Route::get('show-roster',[HomeController::class,'showroster'])->name('show_roster_view');
    Route::get('roster-management',[HomeController::class,'showRosterManagementPage'])->name('show_roster_management_view');
});
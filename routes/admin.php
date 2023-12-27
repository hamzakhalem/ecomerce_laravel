<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Route::prefix('admin')->group(function(){

    Route::middleware(['guest:admin'])->group(function (){
        Route::view('/login', 'backend.pages.admin.auth.login')->name('admin.login');
        Route::post('/loginhandler',[ AdminController::class, 'loginHandler'] )->name('login_handler');
    });

    Route::middleware(['auth:admin'])->group(function (){
        Route::view('/home', 'backend.pages.admin.home')->name('admin.home');
        Route::get('/logouthandler',[ AdminController::class, 'logoutHandler'] )->name('admin.logout');

    });

});
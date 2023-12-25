<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){

    Route::middleware(['guest:admin'])->group(function (){
        Route::view('/login', 'backend.pages.admin.auth.login')->name('login');
    });

    Route::middleware(['auth:admin'])->group(function (){
        Route::view('/home', 'backend.pages.admin.home')->name('login');
    });

});
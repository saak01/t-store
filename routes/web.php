<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function(){
    Route::get('',function(){
        return view('layouts.default_login');
    });
});



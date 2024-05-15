<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    //Formulário Login
    Route::get('', function () {
        return view('layouts.default_login');
    });
    //Auth Passport
    Route::post('/login',['uses' => 'UserController@login', 'role' => 'user.login']);
});


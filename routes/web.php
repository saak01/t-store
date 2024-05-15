<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

    Route::group([],function(){
        //Formulário Login
        Route::get('', ['uses' => 'LoginController@index']);
        //Auth Passport
        Route::post('/login',['uses' => 'LoginController@login', 'role' => '']);
    });


});


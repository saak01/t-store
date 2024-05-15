<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'],function () {

    Route::group([],function(){
        //Formulário Login
        Route::get('', ['uses' => 'LoginController@index']);
        //Auth Passport
        Route::post('/login',['uses' => 'LoginController@login', 'role' => '']);
    });


    Route::group([],function(){
        //Formulário Painel
        Route::get('/home', ['uses' => 'HomeController@index']);
    });

});


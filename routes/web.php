<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'],function () {

    Route::group([],function(){
        //Formulário Login
        Route::get('', ['uses' => 'LoginController@index']);
        //Auth Passport
        Route::post('/login',['uses' => 'LoginController@login', 'role' => '']);
    });


    Route::group(['prefix' => 'home'],function(){
        //Formulário Painel
        Route::get('', ['uses' => 'HomeController@index']);
        //Formulário cadastro das blusas
        Route::get('/cadastrar', ['uses' => 'TshirtController@create']);
    });

});


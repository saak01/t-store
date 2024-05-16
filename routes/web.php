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
        Route::get('/tshirts', ['uses' => 'HomeController@index']);
        //Formulário cadastro das blusas
        Route::get('/tshirts/cadastrar', ['uses' => 'TshirtController@create']);
        //Inserir no banco de dados
        Route::post('/tshirts', ['uses' => 'TshirtController@create']);
    });

});


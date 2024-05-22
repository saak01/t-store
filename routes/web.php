<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'],function () {

    Route::group([],function(){
        //Formulário Login
        Route::get('', ['uses' => 'LoginController@index']);
        //Auth Passport
        Route::post('/login',['uses' => 'LoginController@login']);
    });


    Route::group(['middleware' => 'auth'],function(){
        Route::group(['middleware' => 'check.permission'], function(){
            //Formulário Painel
        Route::get('/tshirts', ['uses' => 'TshirtController@index', 'role' => 'shop.index']);
        //Formulário cadastro das blusas
        Route::get('/tshirts/cadastrar', ['uses' => 'TshirtController@create', 'role' => 'shop.index']);
        //Inserir no banco de dados
        Route::post('/tshirts', ['uses' => 'TshirtController@insert', 'role' => 'shop.create']);
        //Editar Tshirt
        Route::get('/tshirts/{id}/editar', ['uses' => 'TshirtController@edit', 'role' => 'shop.index']);
        //Update Tshirt
        Route::put('/tshirts', ['uses' => 'TshirtController@update', 'role' => 'shop.index']);
        //Deletar Tshirt
        Route::delete('/tshirts', ['uses' => 'TshirtController@delete', 'role' => 'shop.delete']);
        //Rota para pegar imagem
        Route::get('/tshirts/{id}',['uses' => 'FileController@getImage', 'role' => 'shop.index']);
    });
    });

});


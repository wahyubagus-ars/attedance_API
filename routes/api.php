<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('/registration')->group(function(){
    Route::post('/agency', 'RegistrationController@registrationAgency');
    Route::post('/user', 'RegistrationController@registrationUser');
});

Route::prefix('/login')->group(function(){
    Route::post('/agency', 'AuthenticationController@loginAgency');
});

Route::prefix('/attendance')->middleware('jwt.verify')->group(function(){
    Route::get('/', function(){
        return "test";
    });
});
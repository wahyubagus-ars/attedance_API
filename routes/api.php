<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::prefix('/registration')->group(function(){
    Route::post('/agency', 'RegistrationController@registrationAgency');
    Route::post('/user', 'RegistrationController@registrationUser');
    Route::group(['middleware' => 'auth.agency'], function(){
        Route::post('/agency-profile', 'RegistrationController@agencyProfile');
    });
    Route::group(['middleware' => 'auth.user'], function(){
        Route::post('/user-profile', 'RegistrationController@userProfile');
    });
});

Route::prefix('/login')->group(function(){
    Route::post('/agency', 'AuthenticationController@loginAgency');
    Route::post('/user', 'AuthenticationController@loginUser');
});

Route::prefix('/attendance')->middleware('auth.agency')->group(function(){
    Route::get('/', function(){
        return "test";
    });
});

Route::prefix('/agency')->group(function (){
    Route::post('/find', 'AgencyController@getAgencyById');
});

Route::prefix('/user')->group(function (){
    Route::post('/find', 'UserController@getUserById');
});

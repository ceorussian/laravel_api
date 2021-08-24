<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:api'], function () {
    Route::post('login', 'Auth\LoginController@login');
});

Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/profile', 'Auth\LoginController@profile');
    Route::post('/logout', 'Auth\LoginController@logout');
});

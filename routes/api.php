<?php

use Illuminate\Http\Request;
use App\Http\Controllers\apiController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Users API
Route::get('/users', 'apiController@getUsers');
Route::get('/getUserLoggedIn', 'apiController@getLoggedUser');
Route::get('/user/{id}', 'apiController@getUserbyId');
Route::get('/count-users', 'apiController@countUsers');
Route::post('/users', 'apiController@addUser');
Route::patch('/users/{id}', 'apiController@updateUser');
Route::delete('/users/{id}', 'apiController@deleteUser');

// Check user data first
Route::post('/users/check-user-data', 'apiController@checkUserData');

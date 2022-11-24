<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;


Route::group(['prefix' => '/v1'], function () {
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('register', 'UserController@register');
});
Route::group(['prefix' => '/v1', 'middleware' => ['auth:admin-api']], function () {

    // user 
    Route::get('self', 'UserController@self');
    Route::get('user', 'UserController@index');
    Route::post('updateUser', 'UserController@updateUser');
    Route::get('search', 'UserController@search');


    Route::post('addFood', 'FoodController@addFood');
    Route::post('editFood/{id}', 'FoodController@editFood');
    Route::get('searchFood', 'FoodController@search');

    Route::get('getType', 'TypeController@getAll');

    // reservations 
    Route::get('show', 'ReservationController@show');
    Route::post('addReservation', 'ReservationController@addReservation');
    Route::post('editReservation/{id}', 'ReservationController@editReservation');
    Route::put('statusReserve/{id}', 'ReservationController@status');
    Route::delete('deleteReserve/{id}', 'ReservationController@deleteReserve');
});

<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RecordController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::group(['prefix' => '/v1'], function () {
    Route::post('login', [UserController::class, 'login'])->name('login');
    Route::post('register', 'UserController@register');
});
Route::group(['prefix' => '/v1', 'middleware' => ['auth:admin-api']], function () {

    // user 
    Route::get('self', 'UserController@self');
    Route::get('user', 'UserController@index');
    Route::get('getProfile', 'UserController@getProfile');
    Route::post('updateUser/{id}', 'UserController@updateUser');
    Route::get('search', 'UserController@search');
    Route::delete('deleteUser/{id}', 'UserController@deleteUser');


    Route::post('addFood', 'FoodController@addFood');
    Route::post('editFood/{id}', 'FoodController@editFood');
    Route::post('editFoodnoPic/{id}', 'FoodController@editFoodnoPic');
    Route::get('searchFood', 'FoodController@search2');

    Route::get('getType', 'TypeController@getAll');

    // reservations 
    // Route::get('show', 'ReservationController@show');
    // Route::post('addReservation', 'ReservationController@addReservation');
    // Route::post('editReservation/{id}', 'ReservationController@editReservation');
    // Route::put('statusReserve/{id}', 'ReservationController@status');
    // Route::delete('deleteReserve/{id}', 'ReservationController@deleteReserve');

    // Route::post('payment', 'GCashController@payment');


    // Route::get('getFood', 'FoodController@search');

    Route::get('getTray', 'TrayController@show');
    Route::put('trayStatus/{id}', 'TrayController@status');

    // Dashboard 
    Route::get('details', 'DashboardController@details');
    Route::post('charts', 'DashboardController@charts');
    Route::get('records', 'DashboardController@records');
    Route::get('history', 'DashboardController@history');


    Route::put('food_status/{id}', 'FoodController@status');


    // supply 

    Route::post('addSupply', 'SupplyController@addSupply');
    Route::post('editSupply/{id}', 'SupplyController@editSupply');
    Route::get('getAllSupply', 'SupplyController@getAllSupply');


    // Route::post('checkOut', 'RentController@checkOut');
    Route::put('updateIspaid', 'RentController@updateIspaid');
    Route::get('shows', 'RentController@show');
    Route::delete('deleteUnPaid', 'RentController@deleteUnPaid');
    Route::put('statusRent/{id}', 'RentController@status');

    Route::post('payment', 'RentController@payment');
    Route::delete('deleterent/{id}', 'RentController@deleterent');

    Route::get('getGallery', 'GalleryController@show');
    Route::post('addPicture', 'GalleryController@addPicture');
    Route::delete('deletePicture/{id}', 'GalleryController@deletePicture');

    Route::get('show', 'ReservationController@show');
});


Route::group(['prefix' => '/user'], function () {

    Route::get('getFood2', 'FoodController@search2');
    Route::post('OrderShow', 'TrayController@search');
    Route::post('packShow', 'PackageController@search');
    Route::get('getPack', 'PackageController@getPackage');
    Route::get('getmyRent', 'RentController@getmyCheckout');
    Route::get('foodpicture', 'FoodController@picture');


    Route::post('checkOut', 'RentController@checkOut');


    Route::post('payment', 'RentController@payment');
    Route::delete('deleterent/{id}', 'RentController@deleterent');

    Route::post('addReservation', 'ReservationController@addReservation');
    Route::post('editReservation/{id}', 'ReservationController@editReservation');
    Route::put('statusReserve/{id}', 'ReservationController@status');
    Route::delete('deleteReserve/{id}', 'ReservationController@deleteReserve');

    Route::post('payment', 'GCashController@payment');


    Route::get('getFood', 'FoodController@search');

    Route::get('getAllSupplys', 'SupplyController@getAllSupply');

    Route::get('getGalleries', 'GalleryController@getGalleries');

    Route::post('serveTray', 'TrayController@addTray');
    Route::post('addRent', 'RentController@addRent');

    Route::get('getAllSupply', 'RentController@getAllSupply');
});

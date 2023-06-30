<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
//login sigup
Route::post('dang-nhap', 'Api\UserController@login');
Route::post('dang-ky', 'Api\UserController@register');

//product
Route::get('product', 'Api\ProductController@index');
Route::get('noodles-product', 'Api\ProductController@noodles');
Route::get('latest', 'Api\ProductController@Latest');

Route::get('ward', 'Api\ProductController@jsonWard');

//Slider home
Route::get('slider', 'Api\SliderController@index');

//Post
Route::get('post', 'Api\BlogController@index');

//ship
Route::get('ship', 'Api\FeeshipController@index');
Route::get('district', 'Api\FeeshipController@getDistrict');
Route::get('ward', 'Api\FeeshipController@getWard');
Route::get('ward/{id}', 'Api\FeeshipController@getWardbyDistrict');

//reservation
Route::post('reservation', 'Api\ReservationController@index');

//checkout
Route::post('checkout', 'Api\TransationController@store');
Route::get('checkout/user/{id}', 'Api\TransationController@history');
Route::post('checkout/cancelled/{id}', 'Api\TransationController@cancelled');



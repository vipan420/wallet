<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('addTransaction', 'API\Trans@add');
Route::post('doctorList', 'API\Doc@details');
Route::post('countiresList', 'API\Doc@countiresList');
Route::post('rating', 'API\Doc@rating');
Route::post('ratingList', 'API\Doc@ratingList');
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::post('changePassword', 'API\UserController@changePassword');
Route::post('cp', 'API\UserController@cp');
Route::post('deleteAllusers', 'API\UserController@deleteAllusers');

Route::group(['middleware' => 'auth:api'], function()
{
   Route::post('details', 'API\UserController@details');

});

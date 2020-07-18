<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/','Doctor@index')->name('doctorList');
Route::get('/add','Doctor@add')->name('addDoctor');
Route::get('/edit/{id}','Doctor@edit')->name('editDoctor');
Route::get('/approve/{id}','Doctor@approve')->name('approve');
Route::get('delete/{id}','Doctor@delete')->name('deletedoctor');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'Doctor@index')->name('home');

Route::get('/docapp', 'Doctorapp@index')->name('home');
Route::post('/createDoctor', 'Doctor@insert')->name('createDoctor');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

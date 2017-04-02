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


Route::get('/', "HomeController@landing");
Route::get('/blog', "HomeController@index");
Route::get('/about',"HomeController@about");
Route::get('/expo',"HomeController@expo");

Auth::routes();
Route::resource('company','CompanyController');
Route::resource('post','PostController');
Route::get('/cata',"PostController@cata_edit");
Route::put('/cata',"PostController@cata_update");
//Route::post('post','HomeController@store');
//Route::put('post/{id}','HomeController@update');
//Route::delete('post/{id}','HomeController@destroy');

//Route::get('post', 'HomeController@index');
//Route::get('post/create','HomeController@create');
//Route::get('post/{id}/edit','HomeController@edit');
//Route::get('post/{id}','HomeController@show');

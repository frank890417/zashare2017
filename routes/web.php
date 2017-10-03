<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|`
*/


Route::get('/testspa', "HomeController@spa");
Route::get('/', "HomeController@spa");
Route::get('/news', "HomeController@spa");
Route::get('/about', "HomeController@spa");
Route::get('/expo', "HomeController@spa");



// Route::get('/', "HomeController@landing");
Route::get('/blog', "HomeController@index");
// Route::get('/about',"HomeController@about");
// Route::get('/expo',"HomeController@expo");
// Route::get('/news',"HomeController@news");
Route::get('/funding',"HomeController@funding");
Route::get('/pacman',"HomeController@pacman");

Auth::routes();
Route::get('/post/n/{title}',"PostController@show_name");
Route::get('/post/{id}',"PostController@show");

Route::get('/home', "PostController@index");
Route::group(['prefix'=>'manage','middleware' => 'auth'],function(){

  Route::get('/', "PostController@index");
  Route::resource('company','CompanyController');
  Route::resource('post','PostController');
  Route::get('cata',"PostController@cata_edit");
  Route::put('cata',"PostController@cata_update");
});

//Route::post('post','HomeController@store');
//Route::put('post/{id}','HomeController@update');
//Route::delete('post/{id}','HomeController@destroy');

//Route::get('post', 'HomeController@index');
//Route::get('post/create','HomeController@create');
//Route::get('post/{id}/edit','HomeController@edit');
//Route::get('post/{id}','HomeController@show');

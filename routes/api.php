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

Route::get('/user', function (Request $request) {
    return $request->user();

})->middleware('auth:api');

Route::group(['middleware'=>['cors']] , function(){
  Route::resource('company', 'CompanyController');
  Route::get('/company/tag/{tag}','CompanyController@find_by_tag');
  Route::get('/post/{id}/images','PostController@get_images');
  Route::get('/post/all','PostController@get_all');
  Route::get('/post/relate','PostController@get_relate');
  Route::get('/post/test','PostController@test');
  Route::get('/cata/all','PostController@cata_all');
});






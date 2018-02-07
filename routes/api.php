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

// Route::get('/user', function (Request $request) {
//     return $request->user();

// })->middleware('auth:api');

Route::group([
    // 'middleware' => 'jwt.auth',
    // 'namespace' => 'App\Http\Controllers',
    'prefix' => 'auth'
], function ($router) {
    Route::get('login/facebook', 'AuthController@redirectToProvider');
    Route::get('login/facebook/callback', 'AuthController@handleProviderCallback');
    
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::post('upload',"ApiController@upload_image");
Route::get('/page/blog','HomeController@postpage_api');
Route::get('/post/n/{title}','PostController@show_name_api');

Route::group(['middleware'=>['cors']],function(){
  Route::resource('post',"PostApiController");
  Route::resource('cata',"CataApiController");
  Route::resource('company',"CompanyApiController");
  Route::post('upload',"ApiController@upload_image");
  // Auth::routes();
  Route::post("login","Auth\LoginController@postLogin");
});

// Route::group(['middleware'=>['cors']] , function(){
//   Route::resource('company', 'CompanyController');
//   Route::get('/company/tag/{tag}','CompanyController@find_by_tag');
//   Route::get('/post/{id}/images','PostController@get_images');
//   Route::get('/post/all','PostController@get_all');
//   Route::get('/post/published','PostController@get_all_published');
//   Route::get('/post/relate','PostController@get_relate');
//   Route::get('/post/test','PostController@test');
//   Route::get('/post/{title}','PostController@get_title');
//   Route::get('/cata/all','PostController@cata_all');
//   Route::get('/cata','PostController@cata_all');

// });






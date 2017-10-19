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


// Route::get('/testspa', "HomeController@spa");
Route::get('/', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"雜學校 Zashare - 亞洲最大創新教育展",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});
Route::get('/news', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"最新消息 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});
Route::get('/about', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"關於雜學校 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});
Route::get('/ticket', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"展覽購票 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});

Route::get('/expo', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"歷屆展覽 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});


Route::get('/expo2017', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"2017展覽 - 雜學校 Zashare",
            "type"=>"website", 
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});


Route::get('/expo2017/attends', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"參展攤位2017 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});

Route::get('/expo2017/workshops', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"工作坊2017 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});

Route::get('/expo2017/expoinfos', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"展覽導覽 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});


Route::get('/expo2017/building', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"場館介紹2017 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});

Route::get('/blog', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"參展報導 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});
Route::get('/blog/{cata}', function(){
  return view("layouts/app_spa") ->with([
          "meta_og"=>[
            "title"=>"參展報導 - 雜學校 Zashare",
            "type"=>"website",
            "url"=>trim(url()->current()),
            "cover"=>"http://zashare.org/img/main2.jpg",
            "description"=>"一個由民間自主發起由下而上的社會創新策展（前身為“不太乖教育節”）建立1-99歲的「一站式教育資源平台」，聚集所有學校沒教/ 適合每一個你的不同學習路徑 ;以台灣為震央，希望將這份影響力不僅凝聚國內教育創新正向力量，更擴及整個華人世界。"
          ]
        ]);
});

Route::get('/post/n/{title}',"PostController@spa_post");


// Route::get('/', "HomeController@landing");
// Route::get('/blog', "HomeController@index");
// Route::get('/about',"HomeController@about");
// Route::get('/expo',"HomeController@expo");
// Route::get('/news',"HomeController@news");
Route::get('/funding',"HomeController@funding");
Route::get('/pacman',"HomeController@pacman");

Auth::routes();
// Route::get('/post/n/{title}',"PostController@show_name");
// Route::get('/post/{id}',"PostController@show");
use App\Post;
Route::get('/post/{id}',function($id){
  $post = Post::find($id);
  if($post){
    return redirect()->to("/post/n/".$post->title);
  }
  return redirect()->to("/");
});

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
